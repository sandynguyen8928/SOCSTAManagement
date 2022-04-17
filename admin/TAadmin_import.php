<!-- TA Admin Import Page -->

<div class="allPages">

    <!-- Form -->
    <form action="importSuccess.php" method="post">

    <!-- Title -->
    <h2 class="optionTitle">What do you want to import?</h2>

    <div class="courseFunctionContainer">

        <div class="courseFunction">
            <label for="../database/TACohort.csv" class="importAddTitle">TA Cohort</label>
            <input type="radio" id="../database/TACohort.csv" value="../database/TACohort.csv" name="import" class="radioButton">

        </div>
        <div class="courseFunction">
            <label for="../database/CourseQuota.csv" class="importAddTitle">Course Quota</label>
            <input type="radio" id="../database/CourseQuota.csv" value="../database/CourseQuota.csv" name="import">
        </div>
    </div>

    <input type="submit" value="Submit" class="submitButton">
    </form>
</div>