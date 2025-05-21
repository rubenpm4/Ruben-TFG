@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #000;
    }

    /* Estilos generales */
    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background-color: #000;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
    }

    h1 {
        color: #fff;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px !important;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Estilos para la tabla */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
        background-color: #111;
        color: #fff;
    }

    .table thead th {
        background-color: #1f1f1f;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
        padding: 40px;
        text-align: center;
    }

    .table tbody td {
        vertical-align: middle;
        padding: 12px 15px;
        border-bottom: 1px solid #2a2a2a;
        text-align: center;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }

    /* Estilos por posición con más intensidad */
    .table tbody tr:nth-child(-n+5) {
        background-color: rgba(23, 162, 184, 0.2); /* 1–5 */
    }

    .table tbody tr:nth-child(6),
    .table tbody tr:nth-child(7) {
        background-color: rgba(230, 107, 26, 0.2); /* 6–7 */
    }

    .table tbody tr:nth-child(8) {
        background-color: rgba(29, 173, 0, 0.2); /* 8 */
    }

    .table tbody tr:nth-child(n+18):nth-child(-n+20) {
        background-color: rgba(250, 43, 64, 0.2); /* 18–20 */
    }

    /* Equipos */
    .table tbody td:nth-child(2) {
        text-align: left;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .table tbody td:nth-child(2) img {
        margin-right: 10px;
        height: 28px;
        width: auto;
    }

    /* Puntos */
    .table tbody td:last-child {
        font-weight: 600;
        color: #fff;
    }

    /* Sección de clasificación europea */
    .mt-4 {
        margin-top: 30px !important;
        background: #111;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        color: white;
    }

    .mt-4 h5 {
        color: #fff;
        font-weight: 600;
        margin-bottom: 15px;
        border-bottom: 2px solid #333;
        padding-bottom: 8px;
    }

    .list-unstyled {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }

    .list-unstyled li {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #1a1a1a;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .badge {
        font-weight: 600;
        font-size: 0.8rem;
        padding: 6px 10px;
        margin-right: 10px;
        min-width: 40px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-primary {
        background-color: rgba(23, 162, 184, 0.2);;
    }

    .badge-info {
        background-color: rgba(230, 107, 26, 0.2);;
    }

    .badge-warning {
        background-color: rgba(29, 173, 0, 0.2);
    }

    .badge-danger {
        background-color: rgba(250, 43, 64, 0.2);;
    }

    .list-unstyled li:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }
</style>

<div class="container">
    <h1 class="mb-4">Clasificación - 1ª División</h1>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Equipo</th>
                    <th>PJ</th>
                    <th>G</th>
                    <th>E</th>
                    <th>P</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>DG</th>
                    <th>Pts</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="{{ asset('images/equipos_primera/barcelona.png') }}" alt="Barcelona" width="24"> Barcelona</td>
                    <td>37</td>
                    <td>27</td>
                    <td>4</td>
                    <td>6</td>
                    <td>99</td>
                    <td>39</td>
                    <td>+60</td>
                    <td><strong>85</strong></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="{{ asset('images/equipos_primera/realmadrid.png') }}" alt="Real Madrid" width="24"> Real Madrid</td>
                    <td>37</td>
                    <td>25</td>
                    <td>6</td>
                    <td>6</td>
                    <td>76</td>
                    <td>38</td>
                    <td>+38</td>
                    <td><strong>81</strong></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="{{ asset('images/equipos_primera/atleticomadrid.png') }}" alt="Atlético Madrid" width="24"> Atlético Madrid</td>
                    <td>37</td>
                    <td>21</td>
                    <td>10</td>
                    <td>6</td>
                    <td>64</td>
                    <td>30</td>
                    <td>+34</td>
                    <td><strong>73</strong></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><img src="{{ asset('images/equipos_primera/bilbao.png') }}" alt="Athletic Club" width="24"> Athletic</td>
                    <td>37</td>
                    <td>19</td>
                    <td>13</td>
                    <td>5</td>
                    <td>54</td>
                    <td>26</td>
                    <td>+28</td>
                    <td><strong>70</strong></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><img src="{{ asset('images/equipos_primera/villarreal.png') }}" alt="Villarreal" width="24"> Villarreal</td>
                    <td>37</td>
                    <td>19</td>
                    <td>10</td>
                    <td>8</td>
                    <td>67</td>
                    <td>49</td>
                    <td>+18</td>
                    <td><strong>67</strong></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><img src="{{ asset('images/equipos_primera/betis.png') }}" alt="Betis" width="24"> Betis</td>
                    <td>37</td>
                    <td>16</td>
                    <td>11</td>
                    <td>10</td>
                    <td>56</td>
                    <td>49</td>
                    <td>+7</td>
                    <td><strong>59</strong></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><img src="{{ asset('images/equipos_primera/celta.png') }}" alt="Celta de Vigo" width="24"> Celta de Vigo</td>
                    <td>37</td>
                    <td>15</td>
                    <td>7</td>
                    <td>15</td>
                    <td>57</td>
                    <td>56</td>
                    <td>+1</td>
                    <td><strong>52</strong></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><img src="{{ asset('images/equipos_primera/rayo.png') }}" alt="Rayo Vallecano" width="24"> Rayo Vallecano</td>
                    <td>37</td>
                    <td>13</td>
                    <td>12</td>
                    <td>12</td>
                    <td>41</td>
                    <td>45</td>
                    <td>-4</td>
                    <td><strong>51</strong></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><img src="{{ asset('images/equipos_primera/osasuna.png') }}" alt="Osasuna" width="24"> Osasuna</td>
                    <td>37</td>
                    <td>12</td>
                    <td>15</td>
                    <td>10</td>
                    <td>47</td>
                    <td>51</td>
                    <td>-4</td>
                    <td><strong>51</strong></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><img src="{{ asset('images/equipos_primera/mallorca.png') }}" alt="R.C.D. Mallorca" width="24"> R.C.D. Mallorca</td>
                    <td>37</td>
                    <td>13</td>
                    <td>8</td>
                    <td>16</td>
                    <td>35</td>
                    <td>44</td>
                    <td>-9</td>
                    <td><strong>47</strong></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><img src="{{ asset('images/equipos_primera/realsociedad.png') }}" alt="Real Sociedad" width="24"> Real Sociedad</td>
                    <td>37</td>
                    <td>13</td>
                    <td>7</td>
                    <td>17</td>
                    <td>35</td>
                    <td>44</td>
                    <td>-9</td>
                    <td><strong>46</strong></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td><img src="{{ asset('images/equipos_primera/valencia.png') }}" alt="Valencia C. F." width="24"> Valencia C. F</td>
                    <td>37</td>
                    <td>11</td>
                    <td>12</td>
                    <td>14</td>
                    <td>43</td>
                    <td>53</td>
                    <td>-10</td>
                    <td><strong>45</strong></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td><img src="{{ asset('images/equipos_primera/getafe.png') }}" alt="Getafe" width="24"> Getafe</td>
                    <td>37</td>
                    <td>11</td>
                    <td>9</td>
                    <td>17</td>
                    <td>33</td>
                    <td>37</td>
                    <td>-4</td>
                    <td><strong>42</strong></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td><img src="{{ asset('images/equipos_primera/alaves.png') }}" alt="Alavés" width="24"> Alavés</td>
                    <td>37</td>
                    <td>10</td>
                    <td>11</td>
                    <td>16</td>
                    <td>37</td>
                    <td>47</td>
                    <td>-10</td>
                    <td><strong>41</strong></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td><img src="{{ asset('images/equipos_primera/girona.png') }}" alt="Girona" width="24"> Girona</td>
                    <td>37</td>
                    <td>11</td>
                    <td>8</td>
                    <td>18</td>
                    <td>44</td>
                    <td>56</td>
                    <td>-12</td>
                    <td><strong>41</strong></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td><img src="{{ asset('images/equipos_primera/sevilla.png') }}" alt="Sevilla" width="24"> Sevilla</td>
                    <td>37</td>
                    <td>10</td>
                    <td>11</td>
                    <td>16</td>
                    <td>40</td>
                    <td>51</td>
                    <td>-11</td>
                    <td><strong>41</strong></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td><img src="{{ asset('images/equipos_primera/espanyol.png') }}" alt="RCD Espanyol" width="24"> RDC Espanyol</td>
                    <td>37</td>
                    <td>10</td>
                    <td>9</td>
                    <td>18</td>
                    <td>38</td>
                    <td>51</td>
                    <td>-13</td>
                    <td><strong>39</strong></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td><img src="{{ asset('images/equipos_primera/leganes.png') }}" alt="Leganés" width="24"> Leganés</td>
                    <td>37</td>
                    <td>8</td>
                    <td>13</td>
                    <td>16</td>
                    <td>36</td>
                    <td>56</td>
                    <td>-20</td>
                    <td><strong>37</strong></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td><img src="{{ asset('images/equipos_primera/laspalmas.png') }}" alt="U. D. Las Palmas" width="24"> U. D. Las Palmas</td>
                    <td>37</td>
                    <td>8</td>
                    <td>8</td>
                    <td>21</td>
                    <td>40</td>
                    <td>59</td>
                    <td>-19</td>
                    <td><strong>32</strong></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td><img src="{{ asset('images/equipos_primera/valladolid.png') }}" alt="Valladolid" width="24"> Valladolid</td>
                    <td>37</td>
                    <td>4</td>
                    <td>4</td>
                    <td>29</td>
                    <td>26</td>
                    <td>87</td>
                    <td>-61</td>
                    <td><strong>16</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h5>Clasificación Europea y Descenso:</h5>
        <ul class="list-unstyled">
            <li><span class="badge badge-primary">1-5</span> Liga de Campeones</li>
            <li><span class="badge badge-info">6-7</span> Europa League</li>
            <li><span class="badge badge-warning">8</span> Conference League</li>
            <li><span class="badge badge-danger">18-20</span> Descenso a 2º División</li>
        </ul>
    </div>
</div>
@endsection
