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
    .table tbody tr:nth-child(-n+2) {
        background-color: rgba(0, 255, 0, 0.2); /* 1–5 */
    }

    .table tbody tr:nth-child(3),
    .table tbody tr:nth-child(4),
    .table tbody tr:nth-child(5),
    .table tbody tr:nth-child(6) {
        background-color: rgba(152, 255, 84, 0.2); /* 6–7 */
    }

    .table tbody tr:nth-child(n+19):nth-child(-n+22) {
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
        background-color: rgba(0, 255, 0, 0.2);
    }

    .badge-info {
        background-color: rgba(152, 255, 84, 0.2);;
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
    <h1 class="mb-4">Clasificación - 2ª División</h1>
    
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
                    <td><img src="{{ asset('images/equipos_segunda/levante.png') }}" alt="Levante" width="24"> Levante</td>
                    <td>41</td>
                    <td>21</td>
                    <td>13</td>
                    <td>7</td>
                    <td>68</td>
                    <td>42</td>
                    <td>+26</td>
                    <td><strong>76</strong></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="{{ asset('images/equipos_segunda/elche.png') }}" alt="Elche C. F." width="24"> Elche C. F.</td>
                    <td>41</td>
                    <td>21</td>
                    <td>11</td>
                    <td>9</td>
                    <td>55</td>
                    <td>34</td>
                    <td>+21</td>
                    <td><strong>74</strong></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="{{ asset('images/equipos_segunda/oviedo.png') }}" alt="Real Oviedo" width="24"> Real Oviedo</td>
                    <td>41</td>
                    <td>20</td>
                    <td>12</td>
                    <td>9</td>
                    <td>54</td>
                    <td>41</td>
                    <td>+13</td>
                    <td><strong>72</strong></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><img src="{{ asset('images/equipos_segunda/mirandes.png') }}" alt="Mirandés" width="24"> Mirandés</td>
                    <td>41</td>
                    <td>21</td>
                    <td>9</td>
                    <td>11</td>
                    <td>56</td>
                    <td>39</td>
                    <td>+17</td>
                    <td><strong>72</strong></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><img src="{{ asset('images/equipos_segunda/santander.png') }}" alt="Racing de Santander" width="24"> Racing de Santander</td>
                    <td>41</td>
                    <td>19</td>
                    <td>11</td>
                    <td>11</td>
                    <td>63</td>
                    <td>50</td>
                    <td>+13</td>
                    <td><strong>68</strong></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><img src="{{ asset('images/equipos_segunda/almeria.png') }}" alt="Almería" width="24"> Almería</td>
                    <td>41</td>
                    <td>18</td>
                    <td>12</td>
                    <td>11</td>
                    <td>70</td>
                    <td>55</td>
                    <td>+15</td>
                    <td><strong>66</strong></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><img src="{{ asset('images/equipos_segunda/granada.png') }}" alt="Granada" width="24"> Granada</td>
                    <td>41</td>
                    <td>18</td>
                    <td>11</td>
                    <td>12</td>
                    <td>64</td>
                    <td>52</td>
                    <td>+12</td>
                    <td><strong>65</strong></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><img src="{{ asset('images/equipos_segunda/huesca.png') }}" alt="S. D. Huesca" width="24"> S. D. Huesca</td>
                    <td>41</td>
                    <td>17</td>
                    <td>10</td>
                    <td>14</td>
                    <td>55</td>
                    <td>47</td>
                    <td>+8</td>
                    <td><strong>61</strong></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><img src="{{ asset('images/equipos_segunda/eibar.png') }}" alt="Eibar" width="24"> Eibar</td>
                    <td>41</td>
                    <td>15</td>
                    <td>13</td>
                    <td>13</td>
                    <td>44</td>
                    <td>40</td>
                    <td>+4</td>
                    <td><strong>58</strong></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><img src="{{ asset('images/equipos_segunda/albacete.png') }}" alt="Albacete" width="24"> Albacete</td>
                    <td>41</td>
                    <td>15</td>
                    <td>12</td>
                    <td>14</td>
                    <td>56</td>
                    <td>56</td>
                    <td>0</td>
                    <td><strong>57</strong></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><img src="{{ asset('images/equipos_segunda/cadiz.png') }}" alt="Cádiz" width="24"> Cádiz</td>
                    <td>41</td>
                    <td>14</td>
                    <td>13</td>
                    <td>14</td>
                    <td>54</td>
                    <td>51</td>
                    <td>+3</td>
                    <td><strong>55</strong></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td><img src="{{ asset('images/equipos_segunda/burgos.png') }}" alt="Burgos" width="24"> Burgos</td>
                    <td>41</td>
                    <td>15</td>
                    <td>9</td>
                    <td>17</td>
                    <td>39</td>
                    <td>46</td>
                    <td>-7</td>
                    <td><strong>54</strong></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td><img src="{{ asset('images/equipos_segunda/cordoba.png') }}" alt="Córdoba" width="24"> Córdoba</td>
                    <td>41</td>
                    <td>14</td>
                    <td>12</td>
                    <td>15</td>
                    <td>58</td>
                    <td>62</td>
                    <td>-4</td>
                    <td><strong>54</strong></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td><img src="{{ asset('images/equipos_segunda/sporting.png') }}" alt="Sporting Gijón" width="24"> Sporting Gijón</td>
                    <td>41</td>
                    <td>13</td>
                    <td>14</td>
                    <td>14</td>
                    <td>55</td>
                    <td>54</td>
                    <td>+1</td>
                    <td><strong>53</strong></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td><img src="{{ asset('images/equipos_segunda/deportivo.png') }}" alt="Deportivo" width="24"> Deportivo</td>
                    <td>41</td>
                    <td>13</td>
                    <td>14</td>
                    <td>14</td>
                    <td>56</td>
                    <td>50</td>
                    <td>+6</td>
                    <td><strong>53</strong></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td><img src="{{ asset('images/equipos_segunda/malaga.png') }}" alt="Málaga" width="24"> Málaga</td>
                    <td>41</td>
                    <td>12</td>
                    <td>16</td>
                    <td>13</td>
                    <td>40</td>
                    <td>44</td>
                    <td>-4</td>
                    <td><strong>52</strong></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td><img src="{{ asset('images/equipos_segunda/zaragoza.png') }}" alt="Real Zaragoza" width="24"> Real Zaragoza</td>
                    <td>41</td>
                    <td>13</td>
                    <td>12</td>
                    <td>16</td>
                    <td>55</td>
                    <td>59</td>
                    <td>-4</td>
                    <td><strong>51</strong></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td><img src="{{ asset('images/equipos_segunda/castellon.png') }}" alt="Castellón" width="24"> Castellón</td>
                    <td>41</td>
                    <td>13</td>
                    <td>11</td>
                    <td>17</td>
                    <td>61</td>
                    <td>62</td>
                    <td>-1</td>
                    <td><strong>50</strong></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td><img src="{{ asset('images/equipos_segunda/eldense.png') }}" alt="CD Eldense" width="24"> CD Eldense</td>
                    <td>41</td>
                    <td>11</td>
                    <td>12</td>
                    <td>18</td>
                    <td>42</td>
                    <td>60</td>
                    <td>-18</td>
                    <td><strong>45</strong></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td><img src="{{ asset('images/equipos_segunda/tenerife.png') }}" alt="Tenerife" width="24"> Tenerife</td>
                    <td>41</td>
                    <td>8</td>
                    <td>12</td>
                    <td>21</td>
                    <td>35</td>
                    <td>53</td>
                    <td>-18</td>
                    <td><strong>36</strong></td>
                </tr>
                <tr>
                    <td>21</td>
                    <td><img src="{{ asset('images/equipos_segunda/ferrol.png') }}" alt="Racing Ferrol" width="24"> Racing Ferrol</td>
                    <td>41</td>
                    <td>6</td>
                    <td>12</td>
                    <td>23</td>
                    <td>22</td>
                    <td>62</td>
                    <td>-40</td>
                    <td><strong>30</strong></td>
                </tr>
                <tr>
                    <td>22</td>
                    <td><img src="{{ asset('images/equipos_segunda/cartagena.png') }}" alt="Cartagena" width="24"> Cartagena</td>
                    <td>41</td>
                    <td>6</td>
                    <td>5</td>
                    <td>30</td>
                    <td>32</td>
                    <td>75</td>
                    <td>-43</td>
                    <td><strong>23</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h5>Clasificación Europea y Descenso:</h5>
        <ul class="list-unstyled">
            <li><span class="badge badge-primary">1-2</span> Ascenso Directo</li>
            <li><span class="badge badge-info">3-6</span> PlayOffs Ascenso a Primera</li>
            <li><span class="badge badge-danger">19-22</span> Descenso a Primera RFEF</li>
        </ul>
    </div>
</div>
@endsection