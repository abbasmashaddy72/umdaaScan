const colors = require("tailwindcss/colors");
const {
    toRGB,
    withOpacityValue,
} = require("@left4code/tw-starter/dist/js/tailwind-config-helper");

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: "jit",
    presets: [
        require("../../vendor/wireui/wireui/tailwind.config.js"),
        require("../../vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],
    content: [
        "./app/Http/Livewire/Backend/**/*.php",
        "./config/livewire-datatables.php",
        "./config/livewire-ui-modal.php",
        "./resources/views/components/auth/**/*.blade.php",
        "./resources/views/components/backend/**/*.blade.php",
        "./resources/views/auth/**/*.blade.php",
        "./resources/views/layouts/bePartials/**/*.blade.php",
        "./resources/views/layouts/app.blade.php",
        "./resources/views/layouts/guest.blade.php",
        "./resources/views/layouts/bePartials/**/*.blade.php",
        "./resources/views/livewire/backend/**/*.blade.php",
        "./resources/views/livewire/datatables/**/*.blade.php",
        "./resources/views/pages/backend/**/*.blade.php",
        "./resources/views/profile/**/*.blade.php",
        "./resources/views/vendor/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/power-components/livewire-powergrid/resources/views/**/*.php",
        "./vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php",
        "./vendor/wire-elements/modal/resources/views/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],
    darkMode: "class",
    options: {
        safelist: [
            "sm:max-w-2xl",
            {
                pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
                variants: ["sm", "md", "lg", "xl", "2xl"],
            },
        ],
    },
    theme: {
        extend: {
            colors: {
                "pg-primary": colors.gray,
                rgb: toRGB(colors),
                primary: withOpacityValue("--color-primary"),
                secondary: withOpacityValue("--color-secondary"),
                success: withOpacityValue("--color-success"),
                info: withOpacityValue("--color-info"),
                warning: withOpacityValue("--color-warning"),
                pending: withOpacityValue("--color-pending"),
                danger: withOpacityValue("--color-danger"),
                light: withOpacityValue("--color-light"),
                dark: withOpacityValue("--color-dark"),
                slate: {
                    50: withOpacityValue("--color-slate-50"),
                    100: withOpacityValue("--color-slate-100"),
                    200: withOpacityValue("--color-slate-200"),
                    300: withOpacityValue("--color-slate-300"),
                    400: withOpacityValue("--color-slate-400"),
                    500: withOpacityValue("--color-slate-500"),
                    600: withOpacityValue("--color-slate-600"),
                    700: withOpacityValue("--color-slate-700"),
                    800: withOpacityValue("--color-slate-800"),
                    900: withOpacityValue("--color-slate-900"),
                },
                darkmode: {
                    50: withOpacityValue("--color-darkmode-50"),
                    100: withOpacityValue("--color-darkmode-100"),
                    200: withOpacityValue("--color-darkmode-200"),
                    300: withOpacityValue("--color-darkmode-300"),
                    400: withOpacityValue("--color-darkmode-400"),
                    500: withOpacityValue("--color-darkmode-500"),
                    600: withOpacityValue("--color-darkmode-600"),
                    700: withOpacityValue("--color-darkmode-700"),
                    800: withOpacityValue("--color-darkmode-800"),
                    900: withOpacityValue("--color-darkmode-900"),
                },
            },
            fontFamily: {
                roboto: ["Roboto"],
            },
            container: {
                center: true,
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms")({
            strategy: "class",
        }),
    ],
    variants: {
        extend: {
            boxShadow: ["dark"],
        },
    },
};
