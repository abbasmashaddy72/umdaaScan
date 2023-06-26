<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
</head>

<body class="text-xs border-b border-black font-roboto">

    <div class="w-full mb-2 border-b border-black">
        <div class="float-left w-2/3">
            <div class="overflow-hidden w-350 h-100">
                <img class="object-scale-down w-auto h-screen" src="" alt="Logo">
            </div>
        </div>
        <div class="float-right w-1/3">
            <p class="mb-1 text-sm font-bold text-right">Doctor Name</p>
            <p class="pl-2 mb-1 text-xs text-right">Qualification, Department Name</p>
            <p class="mb-0 text-xs text-right"><b>Reg. No:</b> Registration Code</p>
        </div>
    </div>

    <div class="flex">
        <table class="table w-full p-0 m-0 text-xs">
            <tbody>
                <tr>
                    <td class="w-2/3">
                        <span class="font-bold">Address: Address</span>
                    </td>
                    <td class="w-1/3">
                        <span class="font-bold">Contact: Clinic Phone</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-12 mb-2 border-b border-black"></div>

    <div class="flex flex-wrap">
        <div class="w-full">
            <table class="table w-full mb-0 text-xs">
                <tbody>
                    <tr>
                        <td class="w-1/3">
                            <p><span class="font-bold">Name:</span> Patient Name</p>
                            <p><span class="font-bold">UMR:</span> UMR No</p>
                        </td>
                        <td class="w-1/3">
                            <p><span class="font-bold">Age & Gender:</span> Age & Gender</p>
                            <p><span class="font-bold">Billing Date:</span> Appointment Date</p>
                        </td>
                        <td class="w-1/3">
                            <p><span class="font-bold">Location:</span> Location</p>
                            <p><span class="font-bold">Mobile:</span> Mobile Number</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="my-2 border-b border-black"></div>
        </div>
    </div>

    <div class="flex items-center">
        <p class="text-xs font-bold">Vitals</p>
        <table class="table w-full mb-0 text-xs">
            <tbody>
                <tr>
                    <td class="w-6/12">
                        <span class="font-bold">Drug Allergy:</span>
                        <span class="inline-block w-3 h-3 mx-2 border border-black rounded-sm"></span>
                        <span class="mr-4">No</span>
                        <span class="inline-block w-3 h-3 mx-2 border border-black rounded-sm"></span>
                        <span class="mr-4">Yes</span>
                        <span class="mr-4">...........................................................</span>
                    </td>
                    <td class="w-6/12">
                        <p><span class="font-bold">Referred By:</span>
                            <span class="mr-4">.....................................</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="my-2 border-b border-black"></div>

    <table class="table w-full m-0 text-xs">
        <tbody>
            <tr>
                <td class="w-1/5">
                    <p><span class="font-bold">PR:</span> ...............</p>
                    <p class="mt-2"><span class="font-bold">SaO2:</span> ................</p>
                </td>
                <td class="w-1/5">
                    <p><span class="font-bold">BP:</span> ...............</p>
                    <p class="mt-2"><span class="font-bold">Height:</span> ...............</p>
                </td>
                <td class="w-1/5">
                    <p><span class="font-bold">RR:</span> ...............</p>
                    <p class="mt-2"><span class="font-bold">Weight:</span> .................</p>
                </td>
                <td class="w-1/5">
                    <p><span class="font-bold">Temp:</span> .............</p>
                    <p class="mt-2"><span class="font-bold">BMI:</span> ............</p>
                </td>
                <td class="w-1/5">
                    <p>...........<span class="font-bold">:</span> ............</p>
                    <p class="mt-2">...........<span class="font-bold">:</span> ............</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="my-2 border-b border-black"></div>

    <div class="row">
        <p class="text-xs font-bold">Clinical Notes</p>
        <div class="mt-10 text-xs">
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-6 border-b border-gray-300 border-dotted">
            </div>
        </div>
    </div>
    <div class="my-2 border-b border-black"></div>
    <div class="row">
        <p class="text-xs font-bold">Past & Personal History</p>
        <div class="mt-10 text-xs">
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-6 border-b border-gray-300 border-dotted"></div>
        </div>
    </div>
    <div class="my-2 border-b border-black"></div>
    <div class="row">
        <p class="text-xs font-bold">Clinical Diagnosis</p>
        <div class="mt-10 text-xs">
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-6 border-b border-gray-300 border-dotted"></div>
        </div>
    </div>
    <div class="my-2 border-b border-black"></div>
    <div class="row">
        <p class="text-xs font-bold">Investigations</p>
        <div class="mt-10 text-xs">
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-6 border-b border-gray-300 border-dotted"></div>
        </div>
    </div>

    <br>
    <div class="mt-10 row">
        <table class="w-full text-xs table-auto">
            <thead>
                <tr>
                    <th class="w-5 p-2 bg-gray-200 border border-gray-300 rounded-tl-lg"> # </th>
                    <th class="w-40 p-2 bg-blue-200 border border-gray-300"> DRUG NAME (ALL CAPS) </th>
                    <th class="w-12 p-2 bg-blue-200 border border-gray-300"> DOSE </th>
                    <th class="w-12 p-2 bg-blue-200 border border-gray-300"> FREQUENCY<br>(1-0-1) </th>
                    <th class="p-2 bg-blue-200 border border-gray-300 w-11"> FOOD<br>(AF/BF) </th>
                    <th class="w-10 p-2 bg-blue-200 border border-gray-300"> DAYS </th>
                    <th class="w-10 p-2 bg-gray-200 border border-gray-300 rounded-tr-lg"> No. </th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td class="p-2 border border-gray-300"> {{ $i + 1 }} </td>
                        <td class="p-2 border border-gray-300"> &nbsp; </td>
                        <td class="p-2 border border-gray-300"> &nbsp; </td>
                        <td class="p-2 border border-gray-300"> &nbsp; </td>
                        <td class="p-2 border border-gray-300"> &nbsp; </td>
                        <td class="p-2 border border-gray-300"> &nbsp; </td>
                        <td class="p-2 border border-gray-300"> {{ $i + 1 }} </td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300" colspan="7">
                            <span>Remarks</span>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <div class="mt-2 row">
        <p class="text-xs font-bold">General Instructions/Procedures</p>
        <div class="mt-10 text-xs">
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-8 border-b border-gray-300 border-dotted"></div>
            <div class="mb-6 border-b border-gray-300 border-dotted">
            </div>
        </div>
    </div>
    <div class="my-2 border-b border-black"></div>

    <div class="flex">
        <div class="w-6/12">
            <p class="mb-0 text-xs"><span class="font-bold">Follow Up Date:</span> Follow Up Date</p>
            <p class="mb-0 text-xs"><span class="font-bold">Valid Till:</span> n Visit(s)</p>
        </div>
        <div class="w-6/12 text-right">
            <p class="mb-0 text-xs font-bold">Doctor Name</p>
        </div>
    </div>

    <div class="my-2 border-b border-black"></div>

    <div class="flex justify-between text-xs font-bold">
        <div>Powered by UMDAA</div>
        <div>Generated On: <span class="font-medium">{{ date('d M Y') }}</span></div>
    </div>
</body>

</html>
