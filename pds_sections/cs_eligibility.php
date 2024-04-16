<div class="container-fluid">
    <div class="row mt-4 text-center align-items-end">
        <div class="col-4">
            <p>CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES CSEE
                BARANGAY ELIGIBILITY/DRIVER'S LICENSE
            </p>
        </div>
        <div class="col-1">
            <p>RATING<br>(if applicable)</p>
        </div>
        <div class="col-2">
            <p>DATE OF EXAMINATION/CONFERMENT</p>
        </div>
        <div class="col-2">
            <p>PLACE OF EXAMINATION/CONFERMENT</p>
        </div>
        <div class="col-3">
            <div class="row">
                <p>LICENSE (if applicable)</p>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>NUMBER</p>
                </div>
                <div class="col-6">
                    <p>DATE OF VALIDITY</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row-container">
        <div class="row row-row mt-3">
            <div class="col-4">
                <div class="checkbox-container">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" id="null_cse" onclick="checkNA(this)">
                        <label class="form-check-label">N/A</label>
                    </div>
                    <input type="text" name="careerservice[]" id="careerservice" class="form-control group-na">
                </div>
            </div>
            <div class="col-1">
                <input type="text" name="rating[]" id="rating" class="form-control group-na">
            </div>
            <div class="col-2">
                <input type="date" name="exam_date[]" id="exam_date" class="form-control group-na">
            </div>
            <div class="col-2">
                <input type="text" name="exam_place[]" id="exam_place" class="form-control group-na">
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <input type="number" name="license_number[]" id="license_number" class="form-control group-na">
                    </div>
                    <div class="col-6">
                        <input type="date" name="license_dateofvalidity[]" id="license_dateofvalidity" class="form-control group-na">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" id="cse_addrow" name="cse_addrow"
                onclick="addRow()">ADD ROW</button>
        </div>
    </div>
</div>

<script>
    function addRow() {
        // Clone the input-row element
        var newRow = document.querySelector(".row-row").cloneNode(true);

        // Clear input values in the cloned row
        newRow.querySelectorAll("input").forEach((input) => {
            input.value = "";
        });

        // Append the cloned row to the container
        document.querySelector(".row-container").appendChild(newRow);

        // Change the N/A checkbox to a delete button
        var checkbox = newRow.querySelector(".form-check-input");
        checkbox.checked = false; // Uncheck the checkbox
        checkbox.id = ""; // Remove id to avoid duplication
        checkbox.removeAttribute("onclick"); // Remove onclick event
        checkbox.setAttribute("type", "button"); // Change type to button
        checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
        checkbox.nextElementSibling.textContent = "Delete"; // Change label text
    }

    function checkNA(checkbox) {
        var inputs = document.querySelectorAll(".group-na");
        var cse_addrow = document.getElementById("cse_addrow");
        if (checkbox.checked) {
            inputs.forEach(function (input) {
                input.type = "text";
                input.value = "N/A";
                input.disabled = true;
                cse_addrow.disabled = true;
            });
        } else {
            inputs.forEach(function (input) {
                
                input.id == "exam_date" || input.id == "license_dateofvalidity" ? input.type = "date" :
                    input.id == "license_number" ? input.type = "number" :
                        input.type = "text";

                input.value = "";
                input.disabled = false;
                cse_addrow.disabled = false;
            });
        }
    }

    function deleteRow(button) {
        var row = button.closest(".row-row");
        row.remove();
    }

</script>