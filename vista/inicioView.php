
<?php
include_once(__DIR__ ."../../vista/compartidos/apartadosViews.php");
class inicioView extends apartadosViews
{
	public function inicio()
	{
?>
		<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="icon" type="image/png" href="../images/JBCTEXTIL.png">
            <title>
                Inicio
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body class="bg-gray-100">

            <div class="flex h-screen overflow-hidden">
                <?php $this->formSideBarShow(); ?>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

                    <!-- ===== Main  ===== -->
                    <main class="flex-1 bg-green-100 select-none">
                        <div class="mx-auto max-w-screen-2xl p-4 h-full text-black">
                            
                            <!-- Banner -->
                            <div class="w-full h-80 bg-cover bg-center" style="background-image: url('/enfermedades_prg/assets/bannerHospital.png');"></div>

                            <!-- Introducción -->
							<div class="justify-center items-center">
                                    <h1 class="text-4xl text-gray-700 font-bold">Bienvenidos a la Información de Salud</h1>
                            </div>
                            <div class="mt-6 text-lg text-gray-700">

                                <p>Bienvenido a nuestra página. Aquí encontrarás información relevante sobre enfermedades comunes y sus síntomas. A continuación, te presentamos una breve descripción de algunas de las enfermedades más conocidas: Mononucleosis, Dengue, Sarampión y COVID-19.</p>
                            </div>

                            <!-- Sección de las enfermedades (Tabla) -->
                            <div class="grid grid-cols-2 gap-6 mt-8">

                                <!-- Mononucleosis -->
                                <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
                                    <img src="/enfermedades_prg/assets/mononeu.png" alt="Mononucleosis" class="w-full h-40 object-cover rounded-t-lg mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">Mononucleosis</h3>
                                    <p class="text-gray-600 mt-2">La mononucleosis, también conocida como "enfermedad del beso", es una infección viral causada por el virus Epstein-Barr (EBV), que afecta principalmente a los adolescentes y jóvenes adultos, se transmite a través de la saliva, pero también por contacto cercano con personas infectadas; los síntomas comunes incluyen fiebre, dolor de garganta, inflamación de los ganglios linfáticos y fatiga extrema.</p>
                                </div>

                                <!-- Dengue -->
                                <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
                                    <img src="/enfermedades_prg/assets/dengue.jpg" alt="Dengue" class="w-full h-40 object-cover rounded-t-lg mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">Dengue</h3>
                                    <p class="text-gray-600 mt-2">El dengue es una enfermedad viral transmitida por la picadura de mosquitos infectados, principalmente el Aedes aegypti, esta enfermedad es común en regiones tropicales y subtropicales, los síntomas incluyen fiebre alta repentina, dolor intenso en las articulaciones y músculos, dolor detrás de los ojos, y erupción cutánea.</p>
                                </div>

                                <!-- Sarampión -->
                                <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
                                    <img src="/enfermedades_prg/assets/sarampion.jpg" alt="Sarampión" class="w-full h-40 object-cover rounded-t-lg mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">Sarampión</h3>
                                    <p class="text-gray-600 mt-2">El sarampión es una enfermedad viral altamente contagiosa que afecta principalmente a los niños pequeños, se transmite a través de las gotas respiratorias cuando una persona infectada tose o estornuda, los síntomas iniciales incluyen fiebre, tos, secreción nasal y ojos rojos; a medida que avanza, aparece una erupción característica en la piel, comenzando en la cara y extendiéndose por todo el cuerpo.</p>
                                </div>

                                <!-- COVID-19 -->
                                <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
                                    <img src="/enfermedades_prg/assets/covid.jpg" alt="COVID-19" class="w-full h-40 object-cover rounded-t-lg mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">COVID-19</h3>
                                    <p class="text-gray-600 mt-2">El COVID-19 es una enfermedad respiratoria causada por el virus SARS-CoV-2, que se identificó por primera vez en 2019 en Wuhan, China, el virus se transmite principalmente a través de las gotículas respiratorias cuando una persona infectada tose, estornuda o habla, los síntomas varían desde leves, como tos, fiebre y dificultad para respirar, hasta graves, como insuficiencia respiratoria y daño multiorgánico.</p>
                                </div>

                            </div>
                            
                        </div>
                    </main>
                    <!-- ===== Main ===== -->

                </div>
            </div>

        </body>

        </html>
<?php
	}
}
?>