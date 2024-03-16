<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Resetting margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        input,
        button,
        select,
        optgroup,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }

        textarea.form-control {
            height: auto;
        }

        body {
            direction: rtl;
            /* Right-to-left direction for Arabic */
            font-family: Arial, sans-serif;
            /* Using Arial for Arabic text */
            margin: 0;
            /* Resetting body margin */
        }

        .container {
            max-width: 800px;
            /* Adjust as needed */
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .row {
            margin-bottom: 20px;
        }

        hr {
            margin: 20px auto;
            width: 80%;
        }

        textarea {
            width: calc(100% - 16px);
            /* Adjust for padding */
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="center-table">
                <table cellspacing="0" cellpadding="0" class="wpforms-field-large modern">
                    <thead>
                        <tr>
                            <th style="width:20%;"></th>
                            <th style="width:26%;">Could Improve</th>
                            <th style="width:26%;">Meets Expectations</th>
                            <th style="width:26%;">Exceeds Expectations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Punctuality</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>
                            <td><input type="radio" id="exceeds_expectations
                " value="1"
                                    required="">
                            </td>



                        </tr>
                        <tr>
                            <th>Involvement in Group Work</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>
                            <td><input type="radio" id="exceeds_expectations
            " value="1"
                                    required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Initiative and Motivation to Learn</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>
                            <td><input type="radio" id="exceeds_expectations
            " value="1"
                                    required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Creativity and Innovativeness</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>
                            <td><input type="radio" id="exceeds_expectations
            " value="1"
                                    required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Tact and Professional Etiquette</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>
                            <td><input type="radio" id="exceeds_expectations
            " value="1"
                                    required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Support for Others</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>
                            <td><input type="radio" id="exceeds_expectations
            " value="1"
                                    required="">
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <hr>

            </div>

            <div class="center-table">
                <div class="row">
                    <label>Recommendations for Future Learning & Development *
                    </label>
                    <br><br>
                </div>
                <table cellspacing="0" cellpadding="0" class="wpforms-field-large modern">
                    <thead>
                        <tr>
                            <th style="width:20%;"></th>
                            <th style="width:26%;">Yes</th>
                            <th style="width:26%;">No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Ready for more advanced levels on the same topic</th>
                            <td><input type="radio" id="could_improve" value="1" required=""></td>
                            <td><input type="radio" id="meetsexpectations" value="1" required=""></td>

                            </td>



                        </tr>

                    </tbody>

                </table>

            </div>
            <br>
            <div class="row">
                <label>Could benefit from training on a 2-topic, namely *
                </label>
                <br><br>
                <textarea rows="4" type="text" class="form-control"></textarea>
            </div>
            <br>
            <div class="row">
                <label>Could benefit from training on a 3-topic namely *
                </label>
                <br><br>
                <textarea rows="4" type="text" class="form-control"></textarea>
            </div>
            <br>
            <div class="row">
                <label>Comments by Consultant (If any) *
                </label>
                <br><br>
                <textarea rows="4" type="text" class="form-control"></textarea>
            </div>
        </div>
    </div>
</body>

</html>
