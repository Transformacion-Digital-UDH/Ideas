<?php

namespace Database\Seeders;

use App\Models\Equipos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ciclos = [
            [
                "ciclo" => "1",
                "cursos" => [
                    ["codigo" => "062101011", "nombre" => "Lenguaje I", "creditos" => 4],
                    ["codigo" => "062101021", "nombre" => "Matemática Básica I", "creditos" => 4],
                    ["codigo" => "062101031", "nombre" => "Métodos y Técnicas de Estudio", "creditos" => 3],
                    ["codigo" => "062101051", "nombre" => "Psicología General", "creditos" => 3],
                    ["codigo" => "062101061", "nombre" => "Introducción a la Ingeniería de Sistemas e Informática", "creditos" => 3],
                    ["codigo" => "062101041", "nombre" => "Ética y Liderazgo", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "2",
                "cursos" => [
                    ["codigo" => "062102011", "nombre" => "Lenguaje II", "creditos" => 4],
                    ["codigo" => "062102021", "nombre" => "Matemática Básica II", "creditos" => 4],
                    ["codigo" => "062102031", "nombre" => "Ecología y Protección del Medio Ambiente", "creditos" => 3],
                    ["codigo" => "062102041", "nombre" => "Sociología General", "creditos" => 3],
                    ["codigo" => "062102051", "nombre" => "Tecnología Informática", "creditos" => 2],
                    ["codigo" => "062102062", "nombre" => "Desarrollo Personal", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "3",
                "cursos" => [
                    ["codigo" => "062103012", "nombre" => "Álgebra Vectorial", "creditos" => 3],
                    ["codigo" => "062103043", "nombre" => "Matemática Discreta", "creditos" => 4],
                    ["codigo" => "062103022", "nombre" => "Cálculo I", "creditos" => 4],
                    ["codigo" => "062103032", "nombre" => "Fundamentos de Negocios", "creditos" => 3],
                    ["codigo" => "062103053", "nombre" => "Teoría General de Sistemas", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "4",
                "cursos" => [
                    ["codigo" => "062104012", "nombre" => "Física General", "creditos" => 3],
                    ["codigo" => "062104023", "nombre" => "Organización y Arquitectura del Computador", "creditos" => 3],
                    ["codigo" => "062104032", "nombre" => "Cálculo II", "creditos" => 4],
                    ["codigo" => "062104043", "nombre" => "Gestión de Procesos", "creditos" => 3],
                    ["codigo" => "062104052", "nombre" => "Estadística I", "creditos" => 3],
                    ["codigo" => "062104073", "nombre" => "Estructura de datos", "creditos" => 3],
                    ["codigo" => "062104063", "nombre" => "Pensamiento Sistémico", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "5",
                "cursos" => [
                    ["codigo" => "062105013", "nombre" => "Fundamentos de Redes y Telecomunicaciones I", "creditos" => 3],
                    ["codigo" => "062105023", "nombre" => "Sistemas Operativos", "creditos" => 3],
                    ["codigo" => "062105032", "nombre" => "Cálculo III", "creditos" => 4],
                    ["codigo" => "062105043", "nombre" => "Análisis y Diseño de Sistemas", "creditos" => 3],
                    ["codigo" => "062105052", "nombre" => "Estadística II", "creditos" => 3],
                    ["codigo" => "062105063", "nombre" => "Base de Datos I", "creditos" => 3],
                    ["codigo" => "062105073", "nombre" => "Programación Orientada a Objetos", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "6",
                "cursos" => [
                    ["codigo" => "062106013", "nombre" => "Redes y Telecomunicaciones II", "creditos" => 3],
                    ["codigo" => "062106023", "nombre" => "Servidores I", "creditos" => 3],
                    ["codigo" => "062106033", "nombre" => "Desarrollo Web", "creditos" => 3],
                    ["codigo" => "062106043", "nombre" => "Ingeniería de Software", "creditos" => 3],
                    ["codigo" => "062106053", "nombre" => "Fundamentos de Ciencia de Datos", "creditos" => 3],
                    ["codigo" => "062106063", "nombre" => "Base de Datos II", "creditos" => 3],
                    ["codigo" => "062106073", "nombre" => "Lenguaje de Programación I", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "7",
                "cursos" => [
                    ["codigo" => "062107013", "nombre" => "Redes y Telecomunicaciones III", "creditos" => 3],
                    ["codigo" => "062107023", "nombre" => "Servidores II", "creditos" => 3],
                    ["codigo" => "062107033", "nombre" => "Experiencia de Usuario", "creditos" => 3],
                    ["codigo" => "062107043", "nombre" => "Gestión de Proyectos I", "creditos" => 3],
                    ["codigo" => "062107052", "nombre" => "Metodología de la Investigación Científica", "creditos" => 3],
                    ["codigo" => "062107063", "nombre" => "Lenguaje de Programación II", "creditos" => 3]
                ]
            ],
            [
                "ciclo" => "8",
                "cursos" => [
                    ["codigo" => "062108013", "nombre" => "Seguridad de la Información", "creditos" => 3],
                    ["codigo" => "062108023", "nombre" => "Computación en la Nube", "creditos" => 3],
                    ["codigo" => "062108033", "nombre" => "Inteligencia Artificial", "creditos" => 4],
                    ["codigo" => "062108043", "nombre" => "Gestión de Proyectos II", "creditos" => 3],
                    ["codigo" => "062108052", "nombre" => "Seminario de Tesis I", "creditos" => 3],
                    ["codigo" => "062108063", "nombre" => "Lenguaje de Programación III", "creditos" => 3],
                ]
            ],
            [
                "ciclo" => "9",
                "cursos" => [
                    ["codigo" => "062109023", "nombre" => "Evaluación de Software", "creditos" => 3],
                    ["codigo" => "062109013", "nombre" => "Hacking Ético", "creditos" => 3],
                    ["codigo" => "062109033", "nombre" => "Inteligencia de Negocios", "creditos" => 3],
                    ["codigo" => "062109043", "nombre" => "Ingeniería de la Información", "creditos" => 3],
                    ["codigo" => "062109052", "nombre" => "Seminario de Tesis II", "creditos" => 3],
                    ["codigo" => "062109063", "nombre" => "Desarrollo de Aplicaciones Móviles", "creditos" => 3],
                ]
            ],
            [
                "ciclo" => "10",
                "cursos" => [
                    ["codigo" => "062110013", "nombre" => "Derecho Informático y Ética Profesional", "creditos" => 3],
                    ["codigo" => "062110023", "nombre" => "Auditoría de Sistemas e Informática", "creditos" => 3],
                    ["codigo" => "062110033", "nombre" => "Internet de las Cosas", "creditos" => 3],
                    ["codigo" => "062110043", "nombre" => "Formulación y Evaluación de Proyectos de Inversión", "creditos" => 3],
                    ["codigo" => "062110052", "nombre" => "Seminario de Tesis III", "creditos" => 3],
                    ["codigo" => "062110063", "nombre" => "Gobierno de Tecnología de Información", "creditos" => 3],
                ]
            ],
            [
                "ciclo" => "13",
                "cursos" => [
                    ["codigo" => "062113083", "nombre" => "Introducción A La Robótica", "creditos" => 3],
                    ["codigo" => "062113043", "nombre" => "Teoría De Juegos", "creditos" => 3],
                    ["codigo" => "062113093", "nombre" => "Diseño De Interfaz Gráfica", "creditos" => 3],
                    ["codigo" => "062113033", "nombre" => "Software Libre", "creditos" => 3],
                    ["codigo" => "062113113", "nombre" => "Administración De Personal", "creditos" => 3],
                    ["codigo" => "062113182", "nombre" => "Introducción A La Filosofía", "creditos" => 3],
                    ["codigo" => "062113143", "nombre" => "Contabilidad General", "creditos" => 3],
                    ["codigo" => "062113013", "nombre" => "Base De Datos Avanzado", "creditos" => 3],
                    ["codigo" => "062113172", "nombre" => "Seguridad Y Defensa Nacional", "creditos" => 3],
                    ["codigo" => "062113193", "nombre" => "Ingeniería Inversa", "creditos" => 3],
                    ["codigo" => "062113023", "nombre" => "Diseño Asistido Por Computadora", "creditos" => 3],
                    ["codigo" => "062113203", "nombre" => "Redes Neuronales", "creditos" => 3],
                    ["codigo" => "062113123", "nombre" => "Marketing Digital", "creditos" => 3],
                    ["codigo" => "062113153", "nombre" => "Gestión De Centros De Cómputo", "creditos" => 3],
                    ["codigo" => "062113133", "nombre" => "Servicios De Tecnología De Información", "creditos" => 3],
                    ["codigo" => "062113103", "nombre" => "Redes Inalámbricas - Televisión Por Cable", "creditos" => 3],
                    ["codigo" => "062113053", "nombre" => "Plan De Recuperación De Desastres De Tecnologías De Información", "creditos" => 3],
                    ["codigo" => "062113073", "nombre" => "Manufactura Asistida Por Computador", "creditos" => 3],
                    ["codigo" => "062113163", "nombre" => "Tópicos De Ingeniería De Sistemas", "creditos" => 3],
                    ["codigo" => "062113063", "nombre" => "Soporte Operativo De Hardware Y Software", "creditos" => 3],
                ]
            ]
        ];

        foreach ($ciclos as $ciclo) {
            foreach ($ciclo["cursos"] as $curso) {
                $equipo = new Equipos();
                $equipo->equ_codigo = $curso["codigo"];
                $equipo->equ_nombre = $curso["nombre"];
                $equipo->equ_ciclo = $ciclo["ciclo"];
                $equipo->equ_tipo = 'Curso';
                $equipo->save();
            }
        }
        // Equipos::factory(5)->create();
    }
}
