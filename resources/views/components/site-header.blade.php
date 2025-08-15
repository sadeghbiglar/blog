{{-- resources/views/components/site-header.blade.php --}}
<div class="relative overflow-hidden bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white h-52 sm:h-60 lg:h-64">
    {{-- متن هدر --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center relative z-10 text-center lg:text-right">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight drop-shadow-lg animate-fade-in">
            {{ $title ?? 'Welcome to Our Blog' }}
        </h1>
        <p class="mt-2 sm:mt-3 text-md sm:text-lg lg:text-xl max-w-2xl mx-auto lg:mx-0 drop-shadow-md animate-fade-in delay-200">
            {{ $subtitle ?? 'Discover the latest posts, insights, and stories from our authors' }}
        </p>
    </div>

    {{-- موج‌های پارالاکس تمام عرض --}}
    <div class="absolute bottom-0 left-0 w-full h-20 sm:h-24 lg:h-28 overflow-hidden">
        <svg class="absolute bottom-0 left-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="rgba(255,255,255,0.3)" d="M0,192L48,165.3C96,139,192,85,288,69.3C384,53,480,75,576,117.3C672,160,768,224,864,229.3C960,235,1056,181,1152,154.7C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                <animate attributeName="d" dur="12s" repeatCount="indefinite"
                    values="
                    M0,192L48,165.3C96,139,192,85,288,69.3C384,53,480,75,576,117.3C672,160,768,224,864,229.3C960,235,1056,181,1152,154.7C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;
                    M0,160L48,176C96,192,192,224,288,224C384,224,480,192,576,170.7C672,149,768,139,864,144C960,149,1056,171,1152,160C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;
                    M0,192L48,165.3C96,139,192,85,288,69.3C384,53,480,75,576,117.3C672,160,768,224,864,229.3C960,235,1056,181,1152,154.7C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z
                    ">
                </animate>
            </path>
        </svg>
    </div>
</div>

{{-- CSS انیمیشن‌ها --}}
<style>
    .animate-fade-in {
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 1s forwards;
    }
    .animate-fade-in.delay-200 { animation-delay: 0.2s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* پارالاکس هنگام اسکرول */
    @media (prefers-reduced-motion: no-preference) {
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.relative');
            if (header) {
                const offset = window.scrollY;
                const svg = header.querySelector('svg');
                if (svg) svg.style.transform = `translateY(${offset * 0.15}px)`;
            }
        });
    }
</style>
