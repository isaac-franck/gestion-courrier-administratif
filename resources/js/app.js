//
/*
|--------------------------------------------------------------------------
| Thème clair / sombre
|--------------------------------------------------------------------------
*/

const html = document.documentElement;

// Récupérer le thème enregistré
const savedTheme = localStorage.getItem('theme');

// Appliquer le thème enregistré
if (savedTheme === 'dark') {
    html.classList.add('dark');
} else {
    html.classList.remove('dark');
}


/*
|--------------------------------------------------------------------------
| DOM chargé
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {


    /*
    |--------------------------------------------------------------------------
    | Bouton thème clair / sombre
    |--------------------------------------------------------------------------
    */

    const themeToggle = document.getElementById('theme-toggle');
    const themeToggleMobile = document.getElementById('theme-toggle-mobile');

    if (themeToggle) {

        themeToggle.addEventListener('click', () => {

            html.classList.toggle('dark');

            const isDark = html.classList.contains('dark');

            localStorage.setItem(
                'theme',
                isDark ? 'dark' : 'light'
            );

        });


    }

    if(themeToggleMobile)
    {
        themeToggleMobile.addEventListener('click', () => {

            html.classList.toggle('dark');

            const isDark = html.classList.contains('dark');

            localStorage.setItem(
                'theme',
                isDark ? 'dark' : 'light'
            );

        });
    }


    /*
    |--------------------------------------------------------------------------
    | Bouton Hamburger
    |--------------------------------------------------------------------------
    */

    const mobileMenuButton =
        document.getElementById('mobile-menu-button');

    const mobileMenu =
        document.getElementById('mobile-menu');

    const menuOpenIcon =
        document.getElementById('menu-open-icon');

    const menuCloseIcon =
        document.getElementById('menu-close-icon');


    if (
        mobileMenuButton &&
        mobileMenu &&
        menuOpenIcon &&
        menuCloseIcon
    ) {

        mobileMenuButton.addEventListener('click', () => {

            const isOpen =
                !mobileMenu.classList.contains('hidden');

            mobileMenu.classList.toggle('hidden');

            menuOpenIcon.classList.toggle('hidden');

            menuCloseIcon.classList.toggle('hidden');

            mobileMenuButton.setAttribute(
                'aria-expanded',
                String(!isOpen)
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Carousel des fonctionnalités
    |--------------------------------------------------------------------------
    */

    const track =
        document.getElementById('features-track');

    const carousel =
        document.getElementById('features-carousel');

    const prevButton =
        document.getElementById('feature-prev');

    const nextButton =
        document.getElementById('feature-next');

    const dots =
        document.querySelectorAll('.feature-dot');


    // Vérifier que le carousel existe
    if (
        !track ||
        !carousel ||
        !prevButton ||
        !nextButton ||
        dots.length === 0
    ) {
        return;
    }


    let currentSlide = 0;

    const totalSlides = dots.length;

    let autoPlay;


    /*
    |--------------------------------------------------------------------------
    | Afficher une fonctionnalité
    |--------------------------------------------------------------------------
    */

    function showSlide(index) {

        if (index < 0) {
            index = totalSlides - 1;
        }

        if (index >= totalSlides) {
            index = 0;
        }

        currentSlide = index;


        // Déplacement du carousel
        track.style.transform =
            `translateX(-${currentSlide * 100}%)`;


        // Mise à jour des indicateurs
        dots.forEach((dot, index) => {

            if (index === currentSlide) {

                dot.classList.remove(
                    'w-2.5',
                    'bg-slate-300',
                    'dark:bg-slate-700'
                );

                dot.classList.add(
                    'w-8',
                    'bg-green-600',
                    'dark:bg-green-500'
                );

            } else {

                dot.classList.remove(
                    'w-8',
                    'bg-green-600',
                    'dark:bg-green-500'
                );

                dot.classList.add(
                    'w-2.5',
                    'bg-slate-300',
                    'dark:bg-slate-700'
                );

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Suivant
    |--------------------------------------------------------------------------
    */

    nextButton.addEventListener('click', () => {

        showSlide(currentSlide + 1);

        restartAutoPlay();

    });


    /*
    |--------------------------------------------------------------------------
    | Précédent
    |--------------------------------------------------------------------------
    */

    prevButton.addEventListener('click', () => {

        showSlide(currentSlide - 1);

        restartAutoPlay();

    });


    /*
    |--------------------------------------------------------------------------
    | Indicateurs
    |--------------------------------------------------------------------------
    */

    dots.forEach((dot) => {

        dot.addEventListener('click', () => {

            const index =
                Number(dot.dataset.slide);

            showSlide(index);

            restartAutoPlay();

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Lecture automatique
    |--------------------------------------------------------------------------
    */

    function startAutoPlay() {

        autoPlay = setInterval(() => {

            showSlide(currentSlide + 1);

        }, 5000);

    }


    /*
    |--------------------------------------------------------------------------
    | Redémarrer
    |--------------------------------------------------------------------------
    */

    function restartAutoPlay() {

        clearInterval(autoPlay);

        startAutoPlay();

    }


    /*
    |--------------------------------------------------------------------------
    | Pause au survol
    |--------------------------------------------------------------------------
    */

    carousel.addEventListener('mouseenter', () => {

        clearInterval(autoPlay);

    });


    carousel.addEventListener('mouseleave', () => {

        restartAutoPlay();

    });


    /*
    |--------------------------------------------------------------------------
    | Navigation clavier
    |--------------------------------------------------------------------------
    */

    document.addEventListener('keydown', (event) => {

        if (event.key === 'ArrowRight') {

            showSlide(currentSlide + 1);

            restartAutoPlay();

        }

        if (event.key === 'ArrowLeft') {

            showSlide(currentSlide - 1);

            restartAutoPlay();

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Initialisation
    |--------------------------------------------------------------------------
    */

    showSlide(0);

    startAutoPlay();

});

document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // MENU MOBILE / HAMBURGER
    // ==========================================

    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const sidebar = document.getElementById('sidebar');
    const closeSidebarButton =
        document.getElementById('closeSidebarButton');
        const sidebarOverlay =
        document.getElementById('sidebarOverlay');

        function openSidebar() {

        sidebar.classList.remove('-translate-x-full');

        sidebarOverlay.classList.remove('hidden');

    }


    /*
    |--------------------------------------------------------------------------
    | Fermer la sidebar
    |--------------------------------------------------------------------------
    */

    function closeSidebar() {

        sidebar.classList.add('-translate-x-full');

        sidebarOverlay.classList.add('hidden');

    }

    if (mobileMenuButton && sidebar) {

        mobileMenuButton.addEventListener('click', () => {

            openSidebar();

        });

    }

    if (closeSidebarButton && sidebar) {

        closeSidebarButton.addEventListener('click', () => {

            closeSidebar();

        });

    }



    // ==========================================
    // CHANGEMENT DE THÈME
    // ==========================================

    const themeToggle = document.getElementById('themeToggle');

    if (themeToggle) {

        themeToggle.addEventListener('click', () => {

            document.documentElement.classList.toggle('dark');

            const isDark =
                document.documentElement.classList.contains('dark');

            localStorage.setItem(
                'theme',
                isDark ? 'dark' : 'light'
            );

        });

    }


    // ==========================================
    // RESTAURER LE THÈME
    // ==========================================

    const savedTheme = localStorage.getItem('theme');

    if (savedTheme === 'dark') {

        document.documentElement.classList.add('dark');

    } else if (savedTheme === 'light') {

        document.documentElement.classList.remove('dark');

    }

});