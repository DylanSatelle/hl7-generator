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
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in-up {
  animation: fadeInUp 1s ease-out forwards;
}
.delay-1 { animation-delay: 0.2s; }
.delay-2 { animation-delay: 0.4s; }
.delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body class="antialiased">

    <!-- SECTION 0: Welcome (your missing block) -->
    <section class="h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-600 px-10">
        
   <p class="text-white text-3xl md:text-4xl text-center leading-relaxed mb-12 max-w-4xl">
    <span class="block mb-4 animate-fade-in-up delay-1">
        Welcome to the <span class="font-bold">HL7</span> and <span class="font-bold">FHIR</span> Generator site!
    </span>
    <span class="block mb-4 animate-fade-in-up delay-2">
        Your one-stop tool to <strong>create, preview, and download HL7 messages</strong>—whether it's a <strong>single message</strong> using your own data or a <strong>mass set of fake messages</strong> for testing and development.
    </span>
    <span class="block animate-fade-in-up delay-3">
        Learn more about 
        <a href="https://www.hl7.org" target="_blank" class="font-bold underline text-white hover:text-gray-200 hover:underline">HL7</a> 
        and 
        <a href="https://www.hl7.org/fhir/" target="_blank" class="font-bold underline text-white hover:text-gray-200 hover:underline">FHIR</a>, 
        and start generating messages instantly!
    </span>
</p>
  
    
    <div class="flex flex-wrap gap-6 justify-center">
   <a href="{{ route('register') }}"
   class="px-10 py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-white text-indigo-500 shadow-lg hover:-translate-y-1 transition">
    Register
</a>

<a href="{{ route('login') }}"
   class="px-10 py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-transparent text-white border-2 border-white shadow-lg hover:-translate-y-1 transition">
    Login
</a>

            <button class="px-10 py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-purple-600 text-white shadow-lg hover:-translate-y-1 transition">
                Contact
            </button>

            <a href="{{ route('dashboard') }}"
    class="px-10 py-4 text-lg rounded-full font-semibold uppercase tracking-wider bg-green-500 text-white shadow-lg hover:-translate-y-1 transition">
    Dashboard
</a>

        </div>

        
    </section>

    <!-- SECTION 1: HERO / Intro -->
    <section class="h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-900 to-indigo-700 text-center px-10">
        <h1 class="text-6xl font-extrabold mb-6 text-white">HL7 Message Generator</h1>
        <p class="text-xl mb-10 max-w-2xl text-gray-100">
            Create single HL7 messages or generate thousands of realistic test messages instantly.
        </p>

        <div class="flex gap-6">
            <a href="#single" class="bg-white text-black px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-gray-200">
                Single Message
            </a>
            <a href="#mass" class="bg-white text-black px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-gray-200">
                Mass Generator
            </a>
        </div>
    </section>

    <!-- SECTION 2: SINGLE MESSAGE -->
    <section id="single" class="min-h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-600 px-10 py-16">
    <h1 class="text-white text-4xl font-bold mb-12 text-center">Generate Single HL7 Messages</h1>
        <p class="text-white text-2xl text-center mb-8 max-w-3xl">
    Generate a single HL7 message using your own data or our sample data. See it in action and export it instantly as a <span class="font-bold">.HL7</span> file! Create, preview, and download your messages in seconds!
        </p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 w-full">
        <div class="flex flex-col items-center">
            <div class="w-full h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/public/select_segment.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Find your segment, click +
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/public/input_data.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Add your details in
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/public/click_genhl7.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Click generate
            </p>
        </div>
    </div>
</section>


    <!-- SECTION 3: MASS MESSAGE -->
<section id="mass" class="min-h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-600 px-10 py-16">
    <h1 class="text-white text-4xl font-bold mb-12 text-center">Generate Mass HL7 Messages</h1>
    <p class="text-white text-2xl text-center mb-8 max-w-3xl">
        Generate a mass of HL7 messages in seconds! Just select how many fake messages you want, preview them instantly, and export them all as <span class="font-bold">.HL7</span> files bundled in a <span class="font-bold">.zip</span>. Perfect for testing, demos, or training!
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 w-full">
        <div class="flex flex-col items-center">
            <div class="w-full h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/public/mass1.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Enter the number of fake messages you want to generate
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/public/mass2.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Click generate to see all messages
            </p>
        </div>

        <div class="flex flex-col items-center">
            <div class="w-full h-[500px] bg-white rounded-xl shadow-2xl overflow-hidden">
                <img src="{{ asset('storage/pics/public/mass3.png') }}" class="w-full h-full object-cover">
            </div>
            <p class="text-white text-lg mt-4 font-medium text-center">
                Export all messages as a single <span class="font-bold">.zip</span> of <span class="font-bold">.HL7</span> files
            </p>
        </div>
    </div>
</section>

    <!-- SECTION 4: GITHUB / FOOTER -->
    <section class="h-screen w-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-700 to-gray-900 px-10">
        <h2 class="text-white text-4xl font-bold mb-6">Check out my GitHub</h2>
        <a href="https://github.com/DylanSatelle" target="_blank"
           class="px-8 py-4 rounded-full bg-white text-indigo-700 font-bold shadow-lg hover:bg-gray-200">
            Visit GitHub
        </a>
    </section>

</body>
</html>
