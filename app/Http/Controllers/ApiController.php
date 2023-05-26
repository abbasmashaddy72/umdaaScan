<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Locality;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ApiController extends Controller
{
    public function doctors(Request $request)
    {
        $data = Doctor::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function patients(Request $request)
    {
        $data = Patient::query()->select('id', DB::Raw("CONCAT(name, ', ', uuid) AS patientNameUuid"))
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%")->orWhere('uuid', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function localities(Request $request)
    {
        $localities = [];
        $perPage = 100; // Number of records to process per chunk

        $searchTerm = $request->search;

        Locality::query()
            ->join('cities', 'cities.id', '=', 'localities.city_id')
            ->select('localities.id as id', DB::raw("CONCAT(localities.name, ', ', cities.name) AS localityCity"))
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('localities.name', 'like', '%' . $searchTerm . '%');
                $query->orderByRaw("CASE WHEN localities.name LIKE '{$searchTerm}%' THEN 1 ELSE 2 END");
            })
            ->when($request->exists('selected'), function ($query) use ($request) {
                $query->whereIn('localities.id', $request->input('selected', []));
            }, function ($query) {
                $query->limit(10);
            })
            ->chunk($perPage, function ($results) use (&$localities) {
                foreach ($results as $result) {
                    $localities[] = $result;
                }
            });
        $data = $localities;

        // $data = Locality::query()->join('cities', 'cities.id', '=', 'localities.city_id')->select('localities.id as id', DB::Raw("CONCAT(localities.name, ', ', cities.name) AS localityCity"))
        //     ->orderBy('localities.name')
        //     ->when($request->search, fn (Builder $query) => $query->where('localities.name', 'like', "%{$request->search}%"))
        //     ->when(
        //         $request->exists('selected'),
        //         fn (Builder $query) => $query->whereIn('localities.id', $request->input('selected', [])),
        //         fn (Builder $query) => $query->limit(10)
        //     )
        //     ->get();

        return $data;
    }
}
