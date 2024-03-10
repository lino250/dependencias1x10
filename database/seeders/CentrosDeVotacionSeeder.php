<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CentrosDeVotacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('centros')->insert([
            ['parroquia_id' => 1, 'nombre' => 'ALDEA UNIVERSITARIA LOMAS DE AYACUCHO'],
            ['parroquia_id' => 1, 'nombre' => 'CASA COMUNAL ANTONIO GUZMAN BLANCO'],
            ['parroquia_id' => 1, 'nombre' => 'CASA COMUNAL VILLA BOLIVARIANA'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. CREACION FE Y ALEGRIA'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. CUMANAGOTO'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. LA LLANADA'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. LA LLANADA III'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I.M. LUISA CACERES DE ARISMENDI'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. SIMONCITO BRASIL II'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I.M. NUESTRAS RAICES'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION 27 DE NOVIEMBRE'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION 4 DE ABRIL'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION EL VALLE'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION JAGUEY DE LUNA'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION LUIS MARIANO'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION MARANATHA'],
            ['parroquia_id' => 1, 'nombre' => 'CENTRO DE VOTACION VILLA DEL SUR'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.INTEGRAL. ANDRES ELOY BLANCO'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. ANTONIO JOSE DE SUCRE'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I.B. HILDA DE LA CRUZ DIAZ'],
            ['parroquia_id' => 1, 'nombre' => 'C.E.I. SIMONCITO BEBEDERO I'],
            ['parroquia_id' => 1, 'nombre' => 'E.B. BOLIVARIANO'],
            ['parroquia_id' => 1, 'nombre' => 'E.B. BRASIL 3'],
            ['parroquia_id' => 1, 'nombre' => 'E.B. BRASIL 4'],
            ['parroquia_id' => 1, 'nombre' => 'E.B. CONCENTRADA LOS MOLINOS'],
            ['parroquia_id' => 1, 'nombre' => 'ESCUELA BOLIVARIANA BRASIL II'],
            ['parroquia_id' => 1, 'nombre' => 'E.B. FRANCISCO ARISTIGUIETA BADARACCO'],
            ['parroquia_id' => 1, 'nombre' => 'E.T.I. ROBINSONIANA EMILIO TEBAR CARRASCO'],
            ['parroquia_id' => 1, 'nombre' => 'INCES CONSTRUCCION'],
            ['parroquia_id' => 1, 'nombre' => 'INCES INDUSTRIAL'],
            ['parroquia_id' => 1, 'nombre' => 'JARDIN DE INFANCIA ESTADO LARA'],
            ['parroquia_id' => 1, 'nombre' => 'LICEO ANTONIO LEMUS PEREZ'],
            ['parroquia_id' => 1, 'nombre' => 'LICEO BOLIVARIANO CREACION TRES PICOS'],
            ['parroquia_id' => 1, 'nombre' => 'LICEO BOLIVARIANO JOSE SILVERIO GONZALEZ'],
            ['parroquia_id' => 1, 'nombre' => 'LICEO BOLIVARIANO ANTONIO MORALES RAMIREZ'],
            ['parroquia_id' => 1, 'nombre' => 'LICEO BOLIVARIANO MARISCAL SUCRE'],
            ['parroquia_id' => 1, 'nombre' => 'LICEO PEDRO ARNAL'],
            ['parroquia_id' => 1, 'nombre' => 'MEGAINFOCENTRO ANTONIO JOSE DE SUCRE'],
            ['parroquia_id' => 1, 'nombre' => 'MODULO DE SERVICIOS COMUNAL DE CASCAJAL'],
            ['parroquia_id' => 1, 'nombre' => 'PETROCENTRO GRAN PARAISO'],
            ['parroquia_id' => 1, 'nombre' => 'PREESCOLAR BOLIVARIANO CASCAJAL'],
            ['parroquia_id' => 1, 'nombre' => 'PREESCOLAR AÑO INTERNACIONAL DEL NIÑO'],
            ['parroquia_id' => 1, 'nombre' => 'SAPINAES CRUZ SALMERON ACOSTA'],
            ['parroquia_id' => 1, 'nombre' => 'UNIDAD DE TALENTO DEPORTIVO FRANCISCO MOROCHITO RODRIGUEZ'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. ALBERTO SANABRIA'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. ASCANIO VELASQUEZ'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. FE Y ALEGRIA SAN LUIS'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. FRANCISCO DE MIRANDA'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. JOSE ANTONIO RAMOS SUCRE'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. MANUEL SATURNINO PEÑALVER GOMEZ'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. ANEXA PEDRO ARNAL'],
            ['parroquia_id' => 1, 'nombre' => 'U.E EUTIMIO RIVAS'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. REBECA MEJIA'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. VICENTE SUCRE Y URBANEJA'],
            ['parroquia_id' => 1, 'nombre' => 'UNIDAD ESCOLAR PADRE JOSE MARIA VELAZ'],
            ['parroquia_id' => 1, 'nombre' => 'U.E. CRISTOBAL DE QUEZADA'],
            ['parroquia_id' => 2, 'nombre' => 'ASILO DE ANCIANOS SAN VICENTE DE PAUL'],
            ['parroquia_id' => 2, 'nombre' => 'CASA COMUNAN CONSEJO COMUNAL TODOS UNIDOS'],
            ['parroquia_id' => 2, 'nombre' => 'C.E.I. MORAL Y LUCES'],
            ['parroquia_id' => 2, 'nombre' => 'C.E.I. ANDRES ELOY BLANCO (ANEXO)'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA EL TACAL II'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA LOS BORDONES'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA MARIN'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA MOCHIMA'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA PLAN DE LA MESA'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA PROF. ZENAIDA VALERA MAGO'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA BOLIVARIANA SANTIAGO MARIÑO'],
            ['parroquia_id' => 2, 'nombre' => 'E.B. ETANISLAO RENDON'],
            ['parroquia_id' => 2, 'nombre' => 'E.B. JUAN FREITES'],
            ['parroquia_id' => 2, 'nombre' => 'E.B. LA TRINIDAD'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA CONCENTRADA BELLA VISTA'],
            ['parroquia_id' => 2, 'nombre' => 'ESCUELA CONCENTRADA PETARE DE SANTA FE'],
            ['parroquia_id' => 2, 'nombre' => 'GIMNASIO CUBIERTO 26 DE OCTUBRE'],
            ['parroquia_id' => 2, 'nombre' => 'LICEO LUIS GRATEROL BOLIVAR'],
            ['parroquia_id' => 2, 'nombre' => 'NUCLEO CULTURAL BERMUDEZ'],
            ['parroquia_id' => 2, 'nombre' => 'U.E. ANDRES ELOY BLANCO'],
            ['parroquia_id' => 2, 'nombre' => 'U.E. CRUZ ALMANDOZ MORA'],
            ['parroquia_id' => 2, 'nombre' => 'U.E. FEDERAL SUCRE'],
            ['parroquia_id' => 2, 'nombre' => 'U.E. MARCO ANTONIO SALUZZO'],
            ['parroquia_id' => 2, 'nombre' => 'UNIVERSIDAD EXPERIMENTAL DE LAS FUERZAS ARMADAS'],
            ['parroquia_id' => 3, 'nombre' => 'CENTRO DE VOTACION CAMPAMENTO CRUZ DE AGUA'],
            ['parroquia_id' => 3, 'nombre' => 'E.B. CONCENTRADA ARAPITO'],
            ['parroquia_id' => 3, 'nombre' => 'ESCUELA BOLIVARIANA ARAPITO'],
            ['parroquia_id' => 3, 'nombre' => 'ESCUELA BOLIVARIANA INDIGENA MILA DE LA ROCA'],
            ['parroquia_id' => 3, 'nombre' => 'ESCUELA BOLIVARIANA SAN PEDRO'],
            ['parroquia_id' => 3, 'nombre' => 'E.B. MAXIMILIANO CORDOVA'],
            ['parroquia_id' => 3, 'nombre' => 'LICEO BOLIVARIANO CREACION ARAPO'],
            ['parroquia_id' => 3, 'nombre' => 'LICEO BOLIVARIANO BARTOLOME MILA DE LA ROCA'],
            ['parroquia_id' => 4, 'nombre' => 'E.B. BOTALON'],
            ['parroquia_id' => 4, 'nombre' => 'E.B. JUAN GERMAN ROSCIO'],
            ['parroquia_id' => 4, 'nombre' => 'E.B. PIÑANTAL'],
            ['parroquia_id' => 4, 'nombre' => 'ESCUELA BOLIVARIANA JUANA LA AVANZADORA'],
            ['parroquia_id' => 4, 'nombre' => 'ESCUELA BOLIVARIANA SIMON BOLIVAR'],
            ['parroquia_id' => 4, 'nombre' => 'ESCUELA BOLIVARIANA VEGA GRANDE'],
            ['parroquia_id' => 4, 'nombre' => 'E.B. JUAN BAUTISTA LOPEZ'],
            ['parroquia_id' => 4, 'nombre' => 'LICEO BOLIVARIANO MARIANO DE LA COVA'],
            ['parroquia_id' => 4, 'nombre' => 'U.E. NUEVA CORDOVA'],
            ['parroquia_id' => 5, 'nombre' => 'CENTRO DE VOTACION CANCAMURE'],
            ['parroquia_id' => 5, 'nombre' => 'CENTRO DE VOTACION GUARANACHE II'],
            ['parroquia_id' => 5, 'nombre' => 'CENTRO DE VOTACION SAN AGUSTIN'],
            ['parroquia_id' => 5, 'nombre' => 'E.B. CHIRIGUA'],
            ['parroquia_id' => 5, 'nombre' => 'ESCUELA BOLIVARIANA CRISTOBAL COLON'],
            ['parroquia_id' => 5, 'nombre' => 'ESCUELA BOLIVARIANA GUARANACHE ARRIBA'],
            ['parroquia_id' => 5, 'nombre' => 'ESCUELA BOLIVARIANA LA ZONA'],
            ['parroquia_id' => 5, 'nombre' => 'ESCUELA BOLIVARIANA SAN AGUSTIN'],
            ['parroquia_id' => 5, 'nombre' => 'E.B. AGUA SANTA'],
            ['parroquia_id' => 5, 'nombre' => 'E.B. EL CHISPERO'],
            ['parroquia_id' => 5, 'nombre' => 'E.B. GUARANACHE ABAJO'],
            ['parroquia_id' => 5, 'nombre' => 'ESCUELA RIO BRITO'],
            ['parroquia_id' => 5, 'nombre' => 'LICEO BOLIVARIANO SAN JUAN'],
            ['parroquia_id' => 5, 'nombre' => 'U.E. BOLIVARIANA MACARAPANA'],
            ['parroquia_id' => 5, 'nombre' => 'E.E.E. SIMON RODRIGUEZ'],
            ['parroquia_id' => 6, 'nombre' => 'CASA COMUNAN CAMPECHE SECTOR I'],
            ['parroquia_id' => 6, 'nombre' => 'CASA DE LA CULTURA CANTARRANA'],
            ['parroquia_id' => 6, 'nombre' => 'C.E.I. CENTENARIO ANDRES ELOY BLANCO'],
            ['parroquia_id' => 6, 'nombre' => 'C.E.I. MARIA DE LA CONCEPCION PALACIOS Y BLANCO'],
            ['parroquia_id' => 6, 'nombre' => 'C.E.I VIRGEN DEL VALLE'],
            ['parroquia_id' => 6, 'nombre' => 'CENTRO DE PREVENCION INTEGRAL PANCHITO MANDEFUA'],
            ['parroquia_id' => 6, 'nombre' => 'CENTRO DE VOTACION EZEQUIEL ZAMORA'],
            ['parroquia_id' => 6, 'nombre' => 'C.E.I. SOMONCITO BOLIVARIANO BOCA DE SABANA'],
            ['parroquia_id' => 6, 'nombre' => 'COLEGIO NUESTRA SEÑORA DEL CARMEN'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. AQUILES NAZOA'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. BOLIVARIANA CORAZON DE JESUS'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. RANCHERIA'],
            ['parroquia_id' => 6, 'nombre' => 'ESCUELA BOLIVARIANA CRUZ DE LA UNION'],
            ['parroquia_id' => 6, 'nombre' => 'ESCUELA BOLIVARIANA LOS FRAILES'],
            ['parroquia_id' => 6, 'nombre' => 'ESCUELA BOLIVARIANA RIO CARIBE'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. ESTADO MONAGAS'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. LUIS BELTRAN PRIETO FIGUEROA'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. RAFAEL CASTRO MACHADO'],
            ['parroquia_id' => 6, 'nombre' => 'E.B. SANTA TERESA DE JESUS'],
            ['parroquia_id' => 6, 'nombre' => 'E.T. AGROPECUARIA ROBINSONIANA DE PESCA'],
            ['parroquia_id' => 6, 'nombre' => 'INTERNADO JUDICIAL DE CUMANA'],
            ['parroquia_id' => 6, 'nombre' => 'LICEO BOLIVARIANO ANTONIO JOSE DE SUCRE'],
            ['parroquia_id' => 6, 'nombre' => 'LICEO BOLIVARIANO BOCA DE SABANA'],
            ['parroquia_id' => 6, 'nombre' => 'LICEO BOLIVARIANO CORAZON DE JESUS'],
            ['parroquia_id' => 6, 'nombre' => 'LICEO BOLIVARIANO CREACION CANTARRANA'],
            ['parroquia_id' => 6, 'nombre' => 'PETROCENTRO LAS PALOMAS'],
            ['parroquia_id' => 6, 'nombre' => 'U.E. CANDIDO RAMIREZ'],
            ['parroquia_id' => 6, 'nombre' => 'U.E. JOSE ANTONIO RAMOS SUCRE'],
            ['parroquia_id' => 6, 'nombre' => 'U.E. JAVIER ALCALA VASQUEZ'],
            ['parroquia_id' => 6, 'nombre' => 'U.E.GRAN MARISCAL DE AYACUCHO'],
            ['parroquia_id' => 6, 'nombre' => 'U.E. NUEVA ANDALUCIA'],
            ['parroquia_id' => 6, 'nombre' => 'U.E.P. SANTO ANGEL'],
            ['parroquia_id' => 6, 'nombre' => 'U.E. REPUBLICA ARGENTINA'],
            ['parroquia_id' => 6, 'nombre' => 'UNIVERSIDAD ABIERTA SEDE CUMANA'],
            ['parroquia_id' => 7, 'nombre' => 'C.E.I. NUEVA TOLEDO'],
            ['parroquia_id' => 7, 'nombre' => 'C.E.I. BATALLA DE AYACUCHO'],
            ['parroquia_id' => 7, 'nombre' => 'C.E.I. GRAN MARISCAL DE AYACUCHO'],
            ['parroquia_id' => 7, 'nombre' => 'C.E.I. ROSA MATILDE ARISTIMUÑO'],
            ['parroquia_id' => 7, 'nombre' => 'ESCUELA BOLIVARIANA ALI PRIMERA'],
            ['parroquia_id' => 7, 'nombre' => 'ESCUELA BOLIVARIANA LOS CHAIMAS'],
            ['parroquia_id' => 7, 'nombre' => 'E.B. DON ROMULO GALLEGOS'],
            ['parroquia_id' => 7, 'nombre' => 'ESCUELA PRIMARIA BOLIVARIANA ESTADO NUEVA ESPARTA'],
            ['parroquia_id' => 7, 'nombre' => 'E.T.C. MODESTO SILVA'],
            ['parroquia_id' => 7, 'nombre' => 'INFOCENTRO'],
            ['parroquia_id' => 7, 'nombre' => 'LICEO BOLIVARIANO BACHILLER CASTRO MACHADO'],
            ['parroquia_id' => 7, 'nombre' => 'MODULO ASOCIACION CIVIL SUCRE'],
            ['parroquia_id' => 7, 'nombre' => 'MODULO DE SERVICIOS MULTIPLES CAIGUIRE'],
            ['parroquia_id' => 7, 'nombre' => 'SALON DE USOS MULTIPLES FUNDACITE'],
            ['parroquia_id' => 7, 'nombre' => 'TALLER MANZANARES'],
            ['parroquia_id' => 7, 'nombre' => 'U.E. MADRE ALBERTA JIMENEZ'],
            ['parroquia_id' => 7, 'nombre' => 'U.E. BOLIVARIANA LA INMACULADA'],
            ['parroquia_id' => 7, 'nombre' => 'U.E. BOLIVARIANA NUEVA TOLEDO'],
            ['parroquia_id' => 7, 'nombre' => 'U.E. CREACION CAIGUIRE'],
            ['parroquia_id' => 7, 'nombre' => 'U.E. JOSE SILVERIO CORDOVA'],
            ['parroquia_id' => 7, 'nombre' => 'U.E.P. LIBERTADOR'],
     

            ]
                     

        );
    }
}
