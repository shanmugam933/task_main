<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> --}}


        <!-- Styles -->
        <style>
            body {
                background-color: #F0F0F0;
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                margin: 0 auto;
                max-width: 800px;
                padding: 50px;
            }

            h1 {
                color: #555;
                font-size: 36px;
                font-weight: 600;
                margin-bottom: 30px;
                text-align: center;
            }

            table {
                background-color: #FFF;
                border-collapse: collapse;
                margin: 0 auto;
                width: 100%;
            }

            td {
                border: 1px solid #DDD;
                font-size: 18px;
                padding: 10px;
                text-align: left;
                vertical-align: middle;
            }

            td:first-child {
                font-weight: 600;
                width: 200px;
            }

            .gender {
                display: flex;
                align-items: center;
            }

            .gender label {
                margin-right: 10px;
            }

            .male {
                background-color: #4CAF50;
                color: #FFF;
                padding: 5px 10px;
                border-radius: 5px;
            }

            .female {
                background-color: #F44336;
                color: #FFF;
                padding: 5px 10px;
                border-radius: 5px;
            }
            .others{
                background-color: #9e36f4;
                color: #FFF;
                padding: 5px 10px;
                border-radius: 5px;
            }
        </style>
        <body>
            <div class="container">
                <h1>Employee Information</h1>
                <table>
                    <tr>
                        <td>Employee Name</td>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <td>Employee Email</td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>{{ $empDOB }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <div class="gender">
                                <label class="male">{{ $empGender === 'Male' ? 'Male' : '' }}</label>
                                <label class="female">{{ $empGender === 'Female' ? 'Female' : '' }}</label>
                                <label class="others">{{ $empGender === 'Others' ? 'Others' : '' }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>{{ $country }}</td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>{{ $state }}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{ $city }}</td>
                    </tr>
                </table>
            </div>
        </body>
</html>
