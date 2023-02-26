<table>
    <thead>
        <tr>
            <th colspan="2">
                <h4>Datos del sistema</h4>
            </th>
        </tr>
        <tr>
            <th colspan="2">Fecha: {{date('d-m-Y')}}</th>
        </tr>
        <tr>
            <th colspan="2"></th>
        </tr>
        <tr>

            <th>Dato</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>


        <tr>
            <td> Número de Estudiantes /Egresados Hombres </td>
            <td>{{ count($hombres_registrados) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Mujeres </td>
            <td>{{ count($mujeres_registradas) }}</td>
        </tr>

        <!--  -->

        <tr>
            <td> Número de Estudiantes /Egresados Hombres Victimas </td>
            <td>{{ count($hombres_registrados_victimas) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Hombres Jovenes</td>
            <td>{{ count($hombres_registrados_jovenes) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Hombres PcD (Personas con discapacidad) </td>
            <td>{{ count($hombres_registrados_pcd) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Hombres Migrantes Venezolanos </td>
            <td>{{ count($hombres_registrados_venezolanos) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Hombres Grupos Etnicos </td>
            <td>{{ count($hombres_registrados_etnicos) }}</td>
        </tr>
        <!-- / -->
        <tr>
            <td> Número de Estudiantes /Egresados Mujeres Victimas </td>
            <td>{{ count($mujeres_registrados_victimas) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Mujeres Jovenes</td>
            <td>{{ count($mujeres_registrados_jovenes) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Mujeres PcD (Personas con discapacidad) </td>
            <td>{{ count($mujeres_registrados_pcd) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Mujeres Migrantes Venezolanos </td>
            <td>{{ count($mujeres_registrados_venezolanos) }}</td>
        </tr>
        <tr>
            <td> Número de Estudiantes /Egresados Mujeres Grupos Etnicos </td>
            <td>{{ count($mujeres_registrados_etnicos) }}</td>
        </tr>


        <!-- **************************************************************************************** -->

        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Hombres </td>
            <td>{{ count($cv_hombres) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Mujeres </td>
            <td>{{ count($cv_mujeres) }}</td>
        </tr>

        <!--  -->

        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Hombres Victimas </td>
            <td>{{ count($cv_hombres_victimas) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Hombres Jovenes</td>
            <td>{{ count($cv_hombres_jovenes) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Hombres PcD (Personas con discapacidad)
            </td>
            <td>{{ count($cv_hombres_pcd) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Hombres Migrantes Venezolanos </td>
            <td>{{ count($cv_hombres_venezolanos) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Hombres Grupos Etnicos </td>
            <td>{{ count($cv_hombres_etnicos) }}</td>
        </tr>
        <!-- / -->
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Mujeres Victimas </td>
            <td>{{ count($cv_mujeres_victimas) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Mujeres Jovenes</td>
            <td>{{ count($cv_mujeres_jovenes) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Mujeres PcD (Personas con discapacidad)
            </td>
            <td>{{ count($cv_mujeres_pcd) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Mujeres Migrantes Venezolanos </td>
            <td>{{ count($cv_mujeres_venezolanos) }}</td>
        </tr>
        <tr>
            <td> Número de Hojas de Vida Remitidas a empleadores /Egresados Mujeres Grupos Etnicos </td>
            <td>{{ count($cv_mujeres_etnicos) }}</td>
        </tr>


        <!-- **************************************************************************************** -->

        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Hombres </td>
            <td>{{ count($contrato_hombres) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Mujeres </td>
            <td>{{ count($contrato_mujeres) }}</td>
        </tr>

        <!--  -->

        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Hombres Victimas </td>
            <td>{{ count($contrato_hombres_victimas) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Hombres Jovenes</td>
            <td>{{ count($contrato_hombres_jovenes) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Hombres PcD (Personas con discapacidad)
            </td>
            <td>{{ count($contrato_hombres_pcd) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Hombres Migrantes Venezolanos </td>
            <td>{{ count($contrato_hombres_venezolanos) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Hombres Grupos Etnicos </td>
            <td>{{ count($contrato_hombres_etnicos) }}</td>
        </tr>
        <!-- / -->
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Mujeres Victimas </td>
            <td>{{ count($contrato_mujeres_victimas) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Mujeres Jovenes</td>
            <td>{{ count($contrato_mujeres_jovenes) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Mujeres PcD (Personas con discapacidad)
            </td>
            <td>{{ count($contrato_mujeres_pcd) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Mujeres Migrantes Venezolanos </td>
            <td>{{ count($contrato_mujeres_venezolanos) }}</td>
        </tr>
        <tr>
            <td> Número de Personas colocadas con enfoque diferencial /Egresados Mujeres Grupos Etnicos </td>
            <td>{{ count($contrato_mujeres_etnicos) }}</td>
        </tr>


        <tr>
            <td>Número de empleadores registrados/inscritos </td>

            <td>{{$company_registered}}</td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Hombres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Mujeres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Hombres Victimas </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Hombres Jovenes </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Hombres PcD (Personas con
                discapacidad) </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Hombres Migrantes Venezolanos
            </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Hombres Grupos Etnicos </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Mujeres Victimas </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Mujeres Jovenes </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Mujeres PcD (Personas con
                discapacidad) </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Mujeres Migrantes Venezolanos
            </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en entrevista de orientación ocupacional Mujeres Grupos Etnicos </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Hombres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Mujeres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Hombres Victimas </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacionall Hombres Jovenes </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Hombres PcD (Personas con
                discapacidad) </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Hombres Migrantes Venezolanos
            </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Hombres Grupos Etnicos </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Mujeres Victimas </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacionall Mujeres Jovenes </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Mujeres PcD (Personas con
                discapacidad) </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Mujeres Migrantes Venezolanos
            </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas atendidas en actividades de orientación ocupacional Mujeres Grupos Etnicos </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Competencias claves transversales </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Tecnologías de la Información y la Comunicaciones TIC </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Alfabetización o Bachillerato </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Entrenamiento y reentrenamiento técnico </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres Técnico
                laboral </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Competencias claves transversales </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Tecnologías de la Información y la Comunicaciones TIC </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Alfabetización o Bachillerato </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Entrenamiento y reentrenamiento técnico </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres Técnico
                laboral </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Competencias claves transversales </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Tecnologías de la Información y la Comunicaciones TIC </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Alfabetización o Bachillerato </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres
                Entrenamiento y reentrenamiento técnico </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Hombres Técnico
                laboral </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Competencias claves transversales </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Tecnologías de la Información y la Comunicaciones TIC </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Alfabetización o Bachillerato </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres
                Entrenamiento y reentrenamiento técnico </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de personas direccionadas a programas de formación y capacitación para el trabajo Mujeres Técnico
                laboral </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de Personas direccionadas a emprendimiento Hombres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de Personas direccionadas a emprendimiento Mujeres </td>

            <td></td>

        </tr>

        <tr>
            <td>Número de PQRSD radicados en el punto de atención </td>

            <td></td>

        </tr>

        <tr>
            <td>Servicios de gestión y colocación en el exterior </td>

            <td>0</td>

        </tr>

        <tr>
            <td>Observaciones</td>

            <td></td>

        </tr>


    </tbody>
</table>