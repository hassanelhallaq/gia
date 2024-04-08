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
                            <th><label for="support">Punctuality<input type="hidden" id="punctuality" name="punctuality" value="Punctuality" required=""></label></th>
                            <td><input type="radio" id="could_improve_punctuality" value="could improve" required=""></td>
                            <td><input type="radio" id="meetsexpectations_punctuality" value="meetsexpectations" required=""></td>
                            <td><input type="radio" id="exceeds_expectations_punctuality" value="exceeds expectations" required="">
                            </td>



                        </tr>
                        <tr>
                            <th><label for="support">Involvement in Group Work<input type="hidden" id="involvement_in_grpup" name="involvement_in_grpup" value="Involvement in Group Work" required=""></label></th>
                            <td><input type="radio" id="could_improveـinvolvement_in_grpup" value="could improve" required=""></td>
                            <td><input type="radio" id="meetsexpectationsـinvolvement_in_grpup" value="meetsexpectations" required=""></td>
                            <td><input type="radio" id="exceeds_expectationsـinvolvement_in_grpup" value="exceeds expectations" required="">
                            </td>
                        </tr>
                        <tr>
                            <th><label for="support">Initiative and Motivation to Learn<input type="hidden" id="initiative" name="initiative" value="Initiative and Motivation to Learn" required=""></label></th>
                            <td><input type="radio" id="could_improve_initiative" value="could_improve" required=""></td>
                            <td><input type="radio" id="meetsexpectations_initiative" value="meetsexpectations" required=""></td>
                            <td><input type="radio" id="exceeds_expectations_initiative" value="exceeds_expectations" required="">
                            </td>
                        </tr>
                        <tr>
                            <th><label for="support">Creativity and Innovativeness<input type="hidden" id="creativity" name="creativity" value="Creativity and Innovativeness" required=""></label></th>
                            <td><input type="radio" id="could_improve_creativity" value="could_improve" required=""></td>
                            <td><input type="radio" id="meetsexpectations_creativity" value="meetsexpectations" required=""></td>
                            <td><input type="radio" id="exceeds_expectations_creativity" value="exceeds_expectations" required="">
                            </td>
                        </tr>
                        <tr>
                             <th><label for="support">Tact and Professional Etiquette<input type="hidden" id="tact" name="support" value="Tact and Professional Etiquette" required=""></label></th>
                            <td><input type="radio" id="could_improve_tact" value="could_improve" required=""></td>
                            <td><input type="radio" id="meetsexpectations_tact" value="meetsexpectations" required=""></td>
                            <td><input type="radio" id="exceeds_expectations_tact" value="exceeds_expectations" required="">
                            </td>
                        </tr>
                        <tr>
                            <th><label for="support">Support for Others<input type="hidden" id="support" name="support" value="Support for Others" required=""></label></th>
                            <td><input type="radio" id="could_improve_support" value="could_improve" required=""></td>
                            <td><input type="radio" id="meetsexpectations_support" value="meetsexpectations" required=""></td>
                            <td><input type="radio" id="exceeds_expectations_support" value="exceeds_expectations" required="">
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <hr>

            </div>

            <div class="center-table">
                <div class="row">
                    <label>
                    </label>
                    <label for="support">Recommendations for Future Learning & Development *<input type="hidden" id="recommendations" name="recommendations" value="Recommendations for Future Learning & Development" required=""></label>
                    <br><br>
                </div>
                <table cellspacing="0" cellpadding="0" class="wpforms-field-large modern">
                    <thead>
                        <tr>
                            <th style="width:20%;"></th>
                            <th style="width:26%;"><input type="radio" id="could_improve_recommendations" value="could improve" required="">could improve</th>
                            <th style="width:26%;"><input type="radio" id="meetsexpectations_recommendations" value="meetsexpectations" required="">meetsexpectations</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <label for="support">Ready for more advanced levels on the same topic *<input type="hidden" id="ready" name="ready" value="Ready for more advanced levels on the same topic" required=""></label>

                            <th style="width:26%;"><input type="radio" id="could_improve_ready" value="could improve" required="">could improve</th>
                            <th style="width:26%;"><input type="radio" id="meetsexpectations_ready" value="meetsexpectations" required="">meetsexpectations</th>
                            </td>



                        </tr>

                    </tbody>

                </table>

            </div>
            <br>
            <div class="row">
                <label for="support">Could benefit from training on a 2-topic, namely *<input type="hidden" id="benefit" name="benefit" value="Could benefit from training on a 2-topic, namely" required=""></label>
                <br><br>
                <textarea rows="4" name="answe_benefit" id="answe_benefit"  type="text" class="form-control"></textarea>
            </div>
            <br>
            <div class="row">
                <label>Could benefit from training on a 3-topic namely *
                </label>
                <label for="support">Could benefit from training on a 2-topic, namely *<input type="hidden" id="training_benefit" name="training_benefit" value="Could benefit from training on a 3-topic namely" required=""></label>

                <br><br>
                <textarea rows="4" type="text" class="form-control"></textarea>
                <textarea rows="4" name="answe_training_benefit" id="answe_training_benefit"  type="text" class="form-control"></textarea>

            </div>
            <br>
            <div class="row">
                <label>
                </label>
                <label for="support">Comments by Consultant (If any) *<input type="hidden" id="comments" name="comments" value="Comments by Consultant (If any)" required=""></label>

                <br><br>
                <textarea rows="4" type="text" name="answe_comments" id="answe_comments" class="form-control"></textarea>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('feedback-form').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                // Gather form data
                let formData = new FormData(this);

                // Convert form data to JSON
                let jsonObject = {};
                formData.forEach((value, key) => {
                    jsonObject[key] = value;
                });
                let jsonData = JSON.stringify(jsonObject);

                // Send form data to server using AJAX
                fetch('/save-feedback', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    body: jsonData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Log response from server
                    // Handle response as needed (e.g., show success message)
                })
                .catch(error => {
                    console.error('Error:', error); // Log any errors
                    // Handle errors as needed (e.g., show error message)
                });
            });
        });
    </script>
</body>

</html>
