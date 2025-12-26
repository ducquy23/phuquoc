import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/tables/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    primary: '#b92420',
                    primaryAlpha: '#b924201a',
                },
                accent: {
                    yellow: '#fdc672',
                },
                neutral: {
                    quinary: '#0d0d12',
                    gray: '#475467',
                },
            },
            fontFamily: {
                inter: ['Inter', 'sans-serif'],
            },
        },
    },
}
