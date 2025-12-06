<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HL7 Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            scroll-snap-type: y mandatory;
            overflow-y: auto;
        }
        section { scroll-snap-align: start; }
        @keyframes fadeInUp {
          0% { opacity: 0; transform: translateY(20px); }
          100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body class="antialiased">

<!-- SECTION 0: Welcome -->
<section class="h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-600 px-6 md:px-10 text-center">
    <p class="text-white text-2xl sm:text-3xl md:text-4xl leading-relaxed mb-8 md:mb-12 max-w-4xl">
        <span class="block mb-4 animate-fade-in-up delay-1">
            Welcome to the <span class="font-bold">HL7</span> and <span class="font-bold">FHIR</span> Generator site!
        </span>
        <span class="block mb-4 animate-fade-in-up delay-2">
            Your one-stop tool to <strong>create, preview, and download HL7 messages</strong>—whether it's a <strong>single message</strong> or a <strong>mass set of fake messages</strong>.
        </span>
        <span class="block animate-fade-in-up delay-3">
            Learn more about 
            <a href="https://www.hl7.org" target="_blank" class="font-bold underline hover:text-gray-200">HL7</a> 
            and 
            <a href="https://www.hl7.org/fhir/" target="_blank" class="font-bold underline hover:text-gray-200">FHIR</a>.
        </span>
    </p>

    <div class="flex flex-wrap justify-center gap-4 md:gap-6">
        <a href="{{ route('register') }}" class="px-8 py-3 sm:px-10 sm:py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-white text-indigo-500 shadow-lg hover:-translate-y-1 transition w-full sm:w-auto">
            Register
        </a>
        <a href="{{ route('login') }}" class="px-8 py-3 sm:px-10 sm:py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-transparent text-white border-2 border-white shadow-lg hover:-translate-y-1 transition w-full sm:w-auto">
            Login
        </a>
        <button class="px-8 py-3 sm:px-10 sm:py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-purple-600 text-white shadow-lg hover:-translate-y-1 transition w-full sm:w-auto">
            Contact
        </button>
        <a href="{{ route('dashboard') }}" class="px-8 py-3 sm:px-10 sm:py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-green-500 text-white shadow-lg hover:-translate-y-1 transition w-full sm:w-auto">
            Dashboard
        </a>
    </div>
</section>

<!-- SECTION 1: HERO / Intro -->
<section class="h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-900 to-indigo-700 text-center px-6 md:px-10">
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-6 text-white">HL7 Message Generator</h1>
    <p class="text-lg sm:text-xl md:text-2xl mb-10 max-w-2xl text-gray-100">
        Create single HL7 messages or generate thousands of realistic test messages instantly.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
        <a href="#single" class="bg-white text-black px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-gray-200 w-full sm:w-auto text-center">
            Single Message
        </a>
        <a href="#mass" class="bg-white text-black px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-gray-200 w-full sm:w-auto text-center">
            Mass Generator
        </a>
    </div>
</section>

<!-- SECTION 2: SINGLE MESSAGE -->
<section id="single" class="min-h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-600 px-6 md:px-10 py-16">
    <h1 class="text-white text-3xl sm:text-4xl md:text-4xl font-bold mb-8 md:mb-12 text-center">Generate Single HL7 Messages</h1>
    <p class="text-white text-lg sm:text-xl text-center mb-8 max-w-3xl">
        Generate a single HL7 message using your own data or our sample data. Preview and export it as a <span class="font-bold">.HL7</span> file instantly!
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-10 w-full">
        <div class="flex flex-col items-center">
            <div class="w-full h-64 sm:h-80 md:h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/select_segment.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Find your segment, click +
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-64 sm:h-80 md:h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/input_data.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Add your details
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-64 sm:h-80 md:h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/click_genhl7.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Click generate
            </p>
        </div>
    </div>
</section>

<!-- SECTION 3: MASS MESSAGE -->
<section id="mass" class="min-h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-600 px-6 md:px-10 py-16">
    <h1 class="text-white text-3xl sm:text-4xl md:text-4xl font-bold mb-8 md:mb-12 text-center">Generate Mass HL7 Messages</h1>
    <p class="text-white text-lg sm:text-xl text-center mb-8 max-w-3xl">
        Generate a mass of HL7 messages in seconds! Preview and export all messages as <span class="font-bold">.HL7</span> files in a <span class="font-bold">.zip</span>.
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-10 w-full">
        <div class="flex flex-col items-center">
            <div class="w-full h-64 sm:h-80 md:h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/mass1.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Enter the number of fake messages to generate
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-64 sm:h-80 md:h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/mass2.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Click generate to see all messages
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-64 sm:h-80 md:h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/mass3.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Export all messages as a <span class="font-bold">.zip</span>
            </p>
        </div>
    </div>
</section>

<!-- SECTION 4: GITHUB / FOOTER -->
<section class="h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-700 to-gray-900 px-6 md:px-10 text-center">
    <h2 class="text-white text-3xl sm:text-4xl md:text-4xl font-bold mb-6">Check out my GitHub</h2>
    <a href="https://github.com/DylanSatelle" target="_blank" class="px-6 py-3 sm:px-8 sm:py-4 rounded-full bg-white text-indigo-700 font-bold shadow-lg hover:bg-gray-200">
        Visit GitHub
    </a>
</section>

</body>
</html>
