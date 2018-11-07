
    <form action="" method="post" id="inquiryForm">

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName">
            <label for="dep">Department:</label>
            <select class="select" name="depName" id="depName" >
                <option value="" hidden >Select Department</option>
                <option value="CSE">CSE</option>
                <option value="CIV">CIV</option>
                <option value="EC">EC</option>
                <option value="ME">ME</option>
            </select>
            <label for="typeSelect">Type:</label>
            <select class="select" name="typeSelect" id="typeSelect" onchange="return selectTypeFun(this.value)">
                <option value="" hidden >Choose Type</option>
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>

       <div id="addAttendance">
            <label for="stateSelect">Select Status:</label><br>
            <select name="stateSelect" id="stateSelect">
                <option value="" hidden >Select Status</option>
            </select>
            <input type="date" name="stateDate" id="stateDate"><br>
            </div>
        <div id="addMoreDis"></div>
        <div id="addMoreDiv"></div>
        <button id="btnSubmit" onclick="return enquirySubmit()" >Submit</button>    
        <button type="reset" id="reset">Reset</button>   
        <div id="sms"></div>   
    </form>
    <script>
        document.getElementById("stateDate").valueAsDate = new Date();
    </script>