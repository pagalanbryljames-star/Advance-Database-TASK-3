<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Function Demonstration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid mt-3">
        <h1>SQL Functions Demonstration</h1>
        <table class="table table-striped table-hover rounded-3 overflow-hidden shadow-sm">
            <tr>
                <th colspan="4" style="background-color: #223329; color:white">String Functions</th>
            </tr>
            <tr style="background-color:#04AA6D; color:white">
                <th scope="col">SQL Function</th>
                <th scope="col">Description</th>
                <th scope="col">Example Code</th>
                <th scope="col">Example Output</th>
            </tr>
            <?php
            $StringFunctions = [
                ['name' => 'ASCII()', 'desc' => 'Returns the ASCII value for the specific character.', 'sql' => 'SELECT ASCII(ProductName) AS NumCodeOfFirstChar FROM products;', 'file' => 'String_Functions/ASCII_func.php'],
                ['name' => 'CHAR_LENGTH()', 'desc' => 'Returns the length of a string (in characters).', 'sql' => 'SELECT CHAR_LENGTH("SQL Tutorial") AS LengthOfString;', 'file' => 'String_Functions/CHAR_LENGHT_func.php'],
                ['name' => 'CHARACTER_LENGTH()', 'desc' => 'Returns the length of a string (in characters)', 'sql' => "SELECT CHARACTER_LENGTH('SQL Tutorial') AS LengthOfString;", 'file' => 'String_Functions/CHARACTER_LENGHT_func.php'],
                ['name' => 'CONCAT()', 'desc' => 'Adds two or more expressions together.', 'sql' => "SELECT CONCAT(ProductName, ' - $', Price) AS ConcatenatedString FROM products;", 'file' => 'String_Functions/CONCAT_func.php'],
                ['name' => 'CONCAT_WS()', 'desc' => 'Adds two or more expressions together with a separator.', 'sql' => "SELECT CONCAT_WS('-', 'SQL', 'Tutorial', 's', 'fun!') AS ConcatenatedString;", 'file' => 'String_Functions/CONCAT_WS_func.php'],
                ['name' => 'FIELD()', 'desc' => 'Returns the index position of a value in a list of values.', 'sql' => "SELECT FIELD('q', 's', 'q', 'l');", 'file' => 'String_Functions/FIELD_func.php'],
                ['name' => 'FIND_IN_SET()', 'desc' => 'Returns the position of a string within a list of strings.', 'sql' => "SELECT FIND_IN_SET('q', 's,q,l');", 'file' => 'String_Functions/FIND_IN_SET_func.php'],   
                ['name' => 'FORMAT()', 'desc' => 'Formats a number to a format like "#,###,###.##".', 'sql' => "SELECT FORMAT(250500.725, 2);", 'file' => 'String_Functions/FORMAT_func.php'],
                ['name' => 'INSERT()', 'desc' => 'Inserts a string within a string at a specific position.', 'sql' => "SELECT INSERT('SQL Tutorial', 8, 0, ' is fun');", 'file' => 'String_Functions/INSERT_func.php'],
                ['name' => 'INSTR()', 'desc' => 'Returns the position of the first occurrence of a string in another string.', 'sql' => "SELECT INSTR('W3Schools.com', '3') AS MatchPosition;", 'file' => 'String_Functions/INSTR_func.php'],
                ['name' => 'LCASE()', 'desc' => 'Converts a string to lower-case.', 'sql' => "SELECT LCASE('SQL Tutorial is FUN!') AS Result;", 'file' => 'String_Functions/LCASE_func.php'],
                ['name' => 'LEFT()', 'desc' => 'Extracts a number of characters from a string (starting from left).', 'sql' => "SELECT LEFT('SQL Tutorial', 3) AS ExtractString;", 'file' => 'String_Functions/LEFT_func.php'],
                ['name' => 'LENGTH()', 'desc' => 'Returns the length of a string (in bytes).', 'sql' => "SELECT LENGTH('SQL Tutorial') AS LengthOfString;", 'file' => 'String_Functions/LENGTH_func.php'],
                ['name' => 'LOCATE()', 'desc' => 'Returns the position of the first occurrence of a substring in a string.', 'sql' => "SELECT LOCATE('3', 'W3Schools.com') AS MatchPosition;", 'file' => 'String_Functions/LOCATE_func.php'],
                ['name' => 'LOWER()', 'desc' => '	Converts a string to lower-case.', 'sql' => "SELECT LOWER('SQL Tutorial is FUN!');", 'file' => 'String_Functions/LOWER_func.php'],
                ['name' => 'LPAD()', 'desc' => 'Pads a string with another string, to a certain length.', 'sql' => "SELECT LPAD('SQL Tutorial', 20, 'ABC');", 'file' => 'String_Functions/LPAD_func.php'],
                ['name' => 'LTRIM()', 'desc' => 'Removes leading spaces from a string.', 'sql' => "SELECT LTRIM('     SQL Tutorial') AS Result;", 'file' => 'String_Functions/LTRIM_func.php'],
                ['name' => 'MID()', 'desc' => 'Extracts a substring from a string (starting at any position).', 'sql' => "SELECT MID('SQL Tutorial', 5, 3) AS ExtractString;", 'file' => 'String_Functions/MID_func.php'],
                ['name' => 'POSITION()', 'desc' => 'Returns the position of the first occurrence of a substring in a string.', 'sql' => "SELECT POSITION('3' IN 'W3Schools.com') AS MatchPosition;", 'file' => 'String_Functions/POSITION_func.php'],
                ['name' => 'REPEAT()', 'desc' => 'Repeats a string as many times as specified.', 'sql' => "SELECT REPEAT('SQL Tutorial', 3);", 'file' => 'String_Functions/REPEAT_func.php'],
                ['name' => 'REPLACE()', 'desc' => 'Replaces all occurrences of a substring within a string, with a new substring.', 'sql' => "SELECT REPLACE('SQL Tutorial', 'SQL', 'HTML');", 'file' => 'String_Functions/REPLACE_func.php'],
                ['name' => 'REVERSE()', 'desc' => 'Reverses a string and returns the result.', 'sql' => "SELECT REVERSE('SQL Tutorial');", 'file' => 'String_Functions/REVERSE_func.php'],
                ['name' => 'RIGHT()', 'desc' => 'Extracts a number of characters from a string (starting from right).', 'sql' => "SELECT RIGHT('SQL Tutorial', 3) AS ExtractString;", 'file' => 'String_Functions/RIGHT_func.php'],
                ['name' => 'RPAD()', 'desc' => 'Right-pads a string with another string, to a certain length.', 'sql' => "SELECT RPAD('SQL Tutorial', 20, 'ABC');", 'file' => 'String_Functions/RPAD_func.php'],
                ['name' => 'RTRIM()', 'desc' => 'Removes trailing spaces from a string.', 'sql' => "SELECT RTRIM('SQL Tutorial     ') AS RightTrimmedString;", 'file' => 'String_Functions/RTRIM_func.php'],
                ['name' => 'SPACE()', 'desc' => 'Returns a string of the specified number of space characters.', 'sql' => "SELECT SPACE(10);", 'file' => 'String_Functions/SPACE_func.php'],
                ['name' => 'STRCMP()', 'desc' => 'Compares two strings.', 'sql' => "SELECT STRCMP('SQL Tutorial', 'SQL Tutorial');", 'file' => 'String_Functions/STRCMP_func.php'],
                ['name' => 'SUBSTR()', 'desc' => 'Extracts a substring from a string (starting at any position).', 'sql' => "SELECT SUBSTR('SQL Tutorial', 5, 3) AS ExtractString;", 'file' => 'String_Functions/SUBSTR_func.php'],
                ['name' => 'SUBSTRING()', 'desc' => 'Extracts a substring from a string (starting at any position).', 'sql' => "SELECT SUBSTRING('SQL Tutorial', 5, 3) AS ExtractString;", 'file' => 'String_Functions/SUBSTRING_func.php'],
                ['name' => 'SUBSTRING_INDEX()', 'desc' => 'Returns a substring of a string before a specified number of delimiter occurs.', 'sql' => "SELECT SUBSTRING_INDEX('www.w3schools.com', '.', 1);", 'file' => 'String_Functions/SUBSTRING_INDEX_func.php'],
                ['name' => 'TRIM()', 'desc' => 'Removes leading and trailing spaces from a string.', 'sql' => "SELECT TRIM('    SQL Tutorial    ') AS TrimmedString;", 'file' => 'String_Functions/TRIM_func.php'],
                ['name' => 'UCASE()', 'desc' => 'Converts a string to upper-case.', 'sql' => "SELECT UCASE('SQL Tutorial is FUN!');", 'file' => 'String_Functions/UCASE_func.php'],
                ['name' => 'UPPER()', 'desc' => 'Converts a string to upper-case.', 'sql' => "SELECT UPPER('SQL Tutorial is FUN!');", 'file' => 'String_Functions/UPPER_func.php'],
            ];

            foreach ($StringFunctions as $sf) {
                echo "<tr>
                        <td>{$sf['name']}</td>
                        <td>{$sf['desc']}</td>
                        <td><code>" . htmlspecialchars($sf['sql']) . "</code></td>
                        <td><a href='{$sf['file']}' class='btn btn-outline-success' style='font-size:13px;'>View Output</a></td>
                      </tr>";
            }
            ?>
        </table>

        <table class="table table-striped table-hover rounded-3 overflow-hidden shadow-sm">
            <tr>
                <th colspan="4" style="background-color: #223329; color:white">Numeric Functions</th>
            </tr>
            <tr style="background-color:#04AA6D; color:white">
                <th scope="col">SQL Function</th>
                <th scope="col">Description</th>
                <th scope="col">Example Code</th>
                <th scope="col">Example Output</th>
            </tr>

            <?php
            $NumericFunctions = [
                ['name' => 'ABS()', 'desc' => 'Returns the absolute value of a number.', 'sql' => 'SELECT ABS(-243.5);', 'file' => 'Numeric_Functions/ABS_func.php'],
                ['name' => 'ACOS()', 'desc' => 'Returns the arc cosine of a number.', 'sql' => 'SELECT ACOS(0.25);', 'file' => 'Numeric_Functions/ACOS_func.php'],
                ['name' => 'ASIN()', 'desc' => 'Returns the arc sine of a number.', 'sql' => 'SELECT ASIN(0.25);', 'file' => 'Numeric_Functions/ASIN_func.php'],
                ['name' => 'ATAN()', 'desc' => 'Returns the arc tangent of a number.', 'sql' => 'SELECT ATAN(2.5);', 'file' => 'Numeric_Functions/ATAN_func.php'],
                ['name' => 'ATAN2()', 'desc' => 'Returns the arc tangent of two numbers.', 'sql' => 'SELECT ATAN2(0.50, 1);', 'file' => 'Numeric_Functions/ATAN2_func.php'],
                ['name' => 'AVG()', 'desc' => 'Returns the average value of an expression.', 'sql' => 'SELECT AVG(Price) AS AveragePrice FROM Products;', 'file' => 'Numeric_Functions/AVG_func.php'],
                ['name' => 'CEIL()', 'desc' => 'Rounds a number up to the nearest integer.', 'sql' => 'SELECT CEIL(25.75);', 'file' => 'Numeric_Functions/CEIL_func.php'],
                ['name' => 'CEILING()', 'desc' => 'Rounds a number up to the nearest integer.', 'sql' => 'SELECT CEILING(25.75);', 'file' => 'Numeric_Functions/CEILING_func.php'],
                ['name' => 'COS()', 'desc' => 'Returns the cosine of a number.', 'sql' => 'SELECT COS(2);', 'file' => 'Numeric_Functions/COS_func.php'],
                ['name' => 'COT()', 'desc' => 'Returns the cotangent of a number.', 'sql' => 'SELECT COT(6);', 'file' => 'Numeric_Functions/COT_func.php'],
                ['name' => 'COUNT()', 'desc' => 'Returns the number of records returned by a select query.', 'sql' => 'SELECT COUNT(ProductID) AS NumberOfProducts FROM Products;', 'file' => 'Numeric_Functions/COUNT_func.php'],
                ['name' => 'DEGREES()', 'desc' => 'Converts a value in radians to degrees.', 'sql' => 'SELECT DEGREES(1.5);', 'file' => 'Numeric_Functions/DEGREES_func.php'],
                ['name' => 'DIV', 'desc' => 'Used for integer division.', 'sql' => 'SELECT 10 DIV 5;', 'file' => 'Numeric_Functions/DIV_func.php'],
                ['name' => 'EXP()', 'desc' => 'Returns e raised to the power of a specified number.', 'sql' => 'SELECT EXP(1);', 'file' => 'Numeric_Functions/EXP_func.php'],
                ['name' => 'FLOOR()', 'desc' => 'Rounds a number down to the nearest integer.', 'sql' => 'SELECT FLOOR(25.75);', 'file' => 'Numeric_Functions/FLOOR_func.php'],
                ['name' => 'GREATEST()', 'desc' => 'Returns the greatest value of the list of arguments.', 'sql' => 'SELECT GREATEST(3, 12, 34, 8, 25);', 'file' => 'Numeric_Functions/GREATEST_func.php'],
                ['name' => 'LEAST()', 'desc' => 'Returns the smallest value of the list of arguments.', 'sql' => 'SELECT LEAST(3, 12, 34, 8, 25);', 'file' => 'Numeric_Functions/LEAST_func.php'],
                ['name' => 'LN()', 'desc' => 'Returns the natural logarithm of a number.', 'sql' => 'SELECT LN(2);', 'file' => 'Numeric_Functions/LN_func.php'],
                ['name' => 'LOG()', 'desc' => 'Returns the natural logarithm of a number, or the logarithm of a number to a specified base.', 'sql' => 'SELECT LOG(2);', 'file' => 'Numeric_Functions/LOG_func.php'],
                ['name' => 'LOG10()', 'desc' => 'Returns the base-10 logarithm of a number.', 'sql' => 'SELECT LOG10(2);', 'file' => 'Numeric_Functions/LOG10_func.php'],
                ['name' => 'LOG2()', 'desc' => 'Returns the base-2 logarithm of a number.', 'sql' => 'SELECT LOG2(6);', 'file' => 'Numeric_Functions/LOG2_func.php'],
                ['name' => 'MAX()', 'desc' => 'Returns the maximum value in a set of values.', 'sql' => 'SELECT MAX(Price) AS LargestPrice FROM Products;', 'file' => 'Numeric_Functions/MAX_func.php'],
                ['name' => 'MIN()', 'desc' => 'Returns the minimum value in a set of values.', 'sql' => 'SELECT MIN(Price) AS SmallestPrice FROM Products;', 'file' => 'Numeric_Functions/MIN_func.php'],
                ['name' => 'MOD()', 'desc' => 'Returns the remainder of a number divided by another number.', 'sql' => 'SELECT MOD(18, 4);', 'file' => 'Numeric_Functions/MOD_func.php'],
                ['name' => 'PI()', 'desc' => 'Returns the value of PI.', 'sql' => 'SELECT PI();', 'file' => 'Numeric_Functions/PI_func.php'],
                ['name' => 'POW()', 'desc' => 'Returns the value of a number raised to the power of another number.', 'sql' => 'SELECT POW(4, 2);', 'file' => 'Numeric_Functions/POW_func.php'],
                ['name' => 'POWER()', 'desc' => 'Returns the value of a number raised to the power of another number.', 'sql' => 'SELECT POWER(4, 2);', 'file' => 'Numeric_Functions/POWER_func.php'],
                ['name' => 'RADIANS()', 'desc' => 'Converts a degree value into radians.', 'sql' => 'SELECT RADIANS(180);', 'file' => 'Numeric_Functions/RADIANS_func.php'],
                ['name' => 'RAND()', 'desc' => 'Returns a random number.', 'sql' => 'SELECT RAND();', 'file' => 'Numeric_Functions/RAND_func.php'],
                ['name' => 'ROUND()', 'desc' => 'Rounds a number to a specified number of decimal places.', 'sql' => 'SELECT ROUND(135.375, 2);', 'file' => 'Numeric_Functions/ROUND_func.php'],
                ['name' => 'SIGN()', 'desc' => 'Returns the sign of a number.', 'sql' => 'SELECT SIGN(-255);', 'file' => 'Numeric_Functions/SIGN_func.php'],
                ['name' => 'SIN()', 'desc' => 'Returns the sine of a number.', 'sql' => 'SELECT SIN(2);', 'file' => 'Numeric_Functions/SIN_func.php'],
                ['name' => 'SQRT()', 'desc' => 'Returns the square root of a number.', 'sql' => 'SELECT SQRT(64);', 'file' => 'Numeric_Functions/SQRT_func.php'],
                ['name' => 'SUM()', 'desc' => 'Calculates the sum of a set of values.', 'sql' => 'SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails;', 'file' => 'Numeric_Functions/SUM_func.php'],
                ['name' => 'TAN()', 'desc' => 'Returns the tangent of a number.', 'sql' => 'SELECT TAN(1.75);', 'file' => 'Numeric_Functions/TAN_func.php'],
                ['name' => 'TRUNCATE()', 'desc' => 'Truncates a number to the specified number of decimal places.', 'sql' => 'SELECT TRUNCATE(135.375, 2);', 'file' => 'Numeric_Functions/TRUNCATE_func.php'],
            ];
            foreach ($NumericFunctions as $nf) {
                echo "<tr>
                        <td>{$nf['name']}</td>
                        <td>{$nf['desc']}</td>
                        <td><code>" . htmlspecialchars($nf['sql']) . "</code></td>
                        <td><a href='{$nf['file']}' class='btn btn-outline-success' style='font-size:13px;  '>View Output</a></td>
                      </tr>";
            }
            ?>
        </table>
        <table class="table table-striped table-hover rounded-3 overflow-hidden shadow-sm">
            <tr>
                <th colspan="4" style="background-color: #223329; color:white">Date Functions</th>
            </tr>
            <tr style="background-color:#04AA6D; color:white">
                <th scope="col">SQL Function</th>
                <th scope="col">Description</th>
                <th scope="col">Example Code</th>
                <th scope="col">Example Output</th>
            </tr>

            <?php
            $DateFunctions = [
                ['name' => 'ADDDATE()', 'desc' => "Adds a time/date interval to a date and then returns the date.", 'sql' => 'SELECT ADDDATE("2017-06-15", INTERVAL 10 DAY);', 'file' => 'Date_Functions/ADDDATE_func.php'],
                ['name' => 'ADDTIME()', 'desc' => 'Adds a time interval to a time/datetime and then returns the time/datetime', 'sql' => "SELECT ADDTIME('2023-10-15 10:00:00', '02:00:00');", 'file' => 'Date_Functions/ADDTIME_func.php'],
                ['name' => 'CURDATE()', 'desc' => 'Returns the current date', 'sql' => "SELECT CURDATE();", 'file' => 'Date_Functions/CURDATE_func.php'],
                ['name' => 'CURRENT_DATE()', 'desc' => 'Returns the current date', 'sql' => "SELECT CURRENT_DATE();", 'file' => 'Date_Functions/CURRENT_DATE_func.php'],
                ['name' => 'CURRENT_TIME()', 'desc' => 'Returns the current time', 'sql' => "SELECT CURRENT_TIME();", 'file' => 'Date_Functions/CURRENT_TIME_func.php'],
                ['name' => 'CURRENT_TIMESTAMP()', 'desc' => 'Returns the current date and time', 'sql' => "SELECT CURRENT_TIMESTAMP();", 'file' => 'Date_Functions/CURRENT_TIMESTAMP_func.php'],
                ['name' => 'CURTIME()', 'desc' => 'Returns the current time', 'sql' => "SELECT CURTIME();", 'file' => 'Date_Functions/CURTIME_func.php'],
                ['name' => 'DATE()', 'desc' => 'Extracts the date part from a datetime expression', 'sql' => "SELECT DATE('2023-10-15 10:00:00');", 'file' => 'Date_Functions/DATE_func.php'],
                ['name' => 'DATEDIFF()', 'desc' => 'Returns the number of days between two date values', 'sql' => "SELECT DATEDIFF('2023-10-20', '2023-10-15');", 'file' => 'Date_Functions/DATEDIFF_func.php'],
                ['name' => 'DATE_ADD()', 'desc' => 'Adds a time/date interval to a date and then returns the date', 'sql' => "SELECT DATE_ADD('2023-10-15', INTERVAL 10 DAY);", 'file' => 'Date_Functions/DATE_ADD_func.php'],
                ['name' => 'DATE_FORMAT()', 'desc' => 'Formats a date', 'sql' => "SELECT DATE_FORMAT('2023-10-15', '%Y-%m-%d');", 'file' => 'Date_Functions/DATE_FORMAT_func.php'],
                ['name' => 'DATE_SUB()', 'desc' => 'Subtracts a time/date interval from a date and then returns the date', 'sql' => "SELECT DATE_SUB('2023-10-15', INTERVAL 10 DAY);", 'file' => 'Date_Functions/DATE_SUB_func.php'],
                ['name' => 'DAY()', 'desc' => 'Returns the day of the month for a given date', 'sql' => "SELECT DAY('2023-10-15');", 'file' => 'Date_Functions/DAY_func.php'],
                ['name' => 'DAYNAME()', 'desc' => 'Returns the weekday name for a given date', 'sql' => "SELECT DAYNAME('2023-10-15');", 'file' => 'Date_Functions/DAYNAME_func.php'],
                ['name' => 'DAYOFMONTH()', 'desc' => 'Returns the day of the month for a given date', 'sql' => "SELECT DAYOFMONTH('2023-10-15');", 'file' => 'Date_Functions/DAYOFMONTH_func.php'],
                ['name' => 'DAYOFWEEK()', 'desc' => 'Returns the weekday index for a given date', 'sql' => "SELECT DAYOFWEEK('2023-10-15');", 'file' => 'Date_Functions/DAYOFWEEK_func.php'],
                ['name' => 'DAYOFYEAR()', 'desc' => 'Returns the day of the year for a given date', 'sql' => "SELECT DAYOFYEAR('2023-10-15');", 'file' => 'Date_Functions/DAYOFYEAR_func.php'],
                ['name' => 'EXTRACT()', 'desc' => 'Extracts a part from a given date', 'sql' => "SELECT EXTRACT(YEAR FROM '2023-10-15');", 'file' => 'Date_Functions/EXTRACT_func.php'],
                ['name' => 'FROM_DAYS()', 'desc' => 'Returns a date from a numeric datevalue', 'sql' => "SELECT FROM_DAYS(738000);", 'file' => 'Date_Functions/FROM_DAYS_func.php'],
                ['name' => 'HOUR()', 'desc' => 'Returns the hour part for a given date', 'sql' => "SELECT HOUR('10:00:00');", 'file' => 'Date_Functions/HOUR_func.php'],
                ['name' => 'LAST_DAY()', 'desc' => 'Extracts the last day of the month for a given date', 'sql' => "SELECT LAST_DAY('2023-10-15');", 'file' => 'Date_Functions/LAST_DAY_func.php'],
                ['name' => 'LOCALTIME()', 'desc' => 'Returns the current date and time', 'sql' => "SELECT LOCALTIME();", 'file' => 'Date_Functions/LOCALTIME_func.php'],
                ['name' => 'LOCALTIMESTAMP()', 'desc' => 'Returns the current date and time', 'sql' => "SELECT LOCALTIMESTAMP();", 'file' => 'Date_Functions/LOCALTIMESTAMP_func.php'],
                ['name' => 'MAKEDATE()', 'desc' => 'Creates and returns a date based on a year and a number of days value', 'sql' => "SELECT MAKEDATE(2023, 288);", 'file' => 'Date_Functions/MAKEDATE_func.php'],
                ['name' => 'MAKETIME()', 'desc' => 'Creates and returns a time based on an hour, minute, and second value', 'sql' => "SELECT MAKETIME(10, 30, 0);", 'file' => 'Date_Functions/MAKETIME_func.php'],
                ['name' => 'MICROSECOND()', 'desc' => 'Returns the microsecond part of a time/datetime', 'sql' => "SELECT MICROSECOND('10:00:00.123456');", 'file' => 'Date_Functions/MICROSECOND_func.php'],
                ['name' => 'MINUTE()', 'desc' => 'Returns the minute part of a time/datetime', 'sql' => "SELECT MINUTE('10:30:00');", 'file' => 'Date_Functions/MINUTE_func.php'],
                ['name' => 'MONTH()', 'desc' => 'Returns the month part for a given date', 'sql' => "SELECT MONTH('2023-10-15');", 'file' => 'Date_Functions/MONTH_func.php'],
                ['name' => 'MONTHNAME()', 'desc' => 'Returns the name of the month for a given date', 'sql' => "SELECT MONTHNAME('2023-10-15');", 'file' => 'Date_Functions/MONTHNAME_func.php'],
                ['name' => 'NOW()', 'desc' => 'Returns the current date and time', 'sql' => "SELECT NOW();", 'file' => 'Date_Functions/NOW_func.php'],
                ['name' => 'PERIOD_ADD()', 'desc' => 'Adds a specified number of months to a period', 'sql' => "SELECT PERIOD_ADD(202310, 2);", 'file' => 'Date_Functions/PERIOD_ADD_func.php'],
                ['name' => 'PERIOD_DIFF()', 'desc' => 'Returns the difference between two periods', 'sql' => "SELECT PERIOD_DIFF(202310, 202308);", 'file' => 'Date_Functions/PERIOD_DIFF_func.php'],
                ['name' => 'QUARTER()', 'desc' => 'Returns the quarter of the year for a given date value', 'sql' => "SELECT QUARTER('2023-10-15');", 'file' => 'Date_Functions/QUARTER_func.php'],
                ['name' => 'SECOND()', 'desc' => 'Returns the seconds part of a time/datetime', 'sql' => "SELECT SECOND('10:30:45');", 'file' => 'Date_Functions/SECOND_func.php'],
                ['name' => 'SEC_TO_TIME()', 'desc' => 'Returns a time value based on the specified seconds', 'sql' => "SELECT SEC_TO_TIME(37845);", 'file' => 'Date_Functions/SEC_TO_TIME_func.php'],
                ['name' => 'STR_TO_DATE()', 'desc' => 'Returns a date based on a string and a format', 'sql' => "SELECT STR_TO_DATE('October 15 2023', '%M %d %Y');", 'file' => 'Date_Functions/STR_TO_DATE_func.php'],
                ['name' => 'SUBDATE()', 'desc' => 'Subtracts a time/date interval from a date and then returns the date', 'sql' => "SELECT SUBDATE('2023-10-15', INTERVAL 10 DAY);", 'file' => 'Date_Functions/SUBDATE_func.php'],
                ['name' => 'SUBTIME()', 'desc' => 'Subtracts a time interval from a datetime and then returns the time/datetime', 'sql' => "SELECT SUBTIME('10:30:00', '02:00:00');", 'file' => 'Date_Functions/SUBTIME_func.php'],
                ['name' => 'SYSDATE()', 'desc' => 'Returns the current date and time', 'sql' => "SELECT SYSDATE();", 'file' => 'Date_Functions/SYSDATE_func.php'],
                ['name' => 'TIME()', 'desc' => 'Extracts the time part from a given time/datetime', 'sql' => "SELECT TIME('2023-10-15 10:30:00');", 'file' => 'Date_Functions/TIME_func.php'],
                ['name' => 'TIME_FORMAT()', 'desc' => 'Formats a time by a specified format', 'sql' => "SELECT TIME_FORMAT('10:30:00', '%h %i %p');", 'file' => 'Date_Functions/TIME_FORMAT_func.php'],
                ['name' => 'TIME_TO_SEC()', 'desc' => 'Converts a time value into seconds', 'sql' => "SELECT TIME_TO_SEC('10:30:00');", 'file' => 'Date_Functions/TIME_TO_SEC_func.php'],
                ['name' => 'TIMEDIFF()', 'desc' => 'Returns the difference between two time/datetime expressions', 'sql' => "SELECT TIMEDIFF('12:00:00', '10:00:00');", 'file' => 'Date_Functions/TIMEDIFF_func.php'],
                ['name' => 'TIMESTAMP()', 'desc' => 'Returns a datetime value based on a date or datetime value', 'sql' => "SELECT TIMESTAMP('2023-10-15');", 'file' => 'Date_Functions/TIMESTAMP_func.php'],
                ['name' => 'TO_DAYS()', 'desc' => 'Returns the number of days between a date and date "0000-00-00"', 'sql' => "SELECT TO_DAYS('2023-10-15');", 'file' => 'Date_Functions/TO_DAYS_func.php'],
                ['name' => 'WEEK()', 'desc' => 'Returns the week number for a given date', 'sql' => "SELECT WEEK('2023-10-15');", 'file' => 'Date_Functions/WEEK_func.php'],
                ['name' => 'WEEKDAY()', 'desc' => 'Returns the weekday number for a given date', 'sql' => "SELECT WEEKDAY('2023-10-15');", 'file' => 'Date_Functions/WEEKDAY_func.php'],
                ['name' => 'WEEKOFYEAR()', 'desc' => 'Returns the week number for a given date', 'sql' => "SELECT WEEKOFYEAR('2023-10-15');", 'file' => 'Date_Functions/WEEKOFYEAR_func.php'],
                ['name' => 'YEAR()', 'desc' => 'Returns the year part for a given date', 'sql' => "SELECT YEAR('2023-10-15');", 'file' => 'Date_Functions/YEAR_func.php'],
                ['name' => 'YEARWEEK()', 'desc' => 'Returns the year and week number for a given date', 'sql' => "SELECT YEARWEEK('2023-10-15');", 'file' => 'Date_Functions/YEARWEEK_func.php'],
            ];
            foreach ($DateFunctions as $df) {
                echo "<tr>
                        <td>{$df['name']}</td>
                        <td>{$df['desc']}</td>
                        <td><code>" . htmlspecialchars($df['sql']) . "</code></td>
                        <td><a href='{$df['file']}' class='btn btn-outline-success' style='font-size:13px;  '>View Output</a></td>
                      </tr>";
            }
            ?>
        </table>

        
        <table class="table table-striped table-hover rounded-3 overflow-hidden shadow-sm">
            <tr>
                <th colspan="4" style="background-color: #223329; color:white">Advanced Functions</th>
            </tr>
            <tr style="background-color:#04AA6D; color:white">
                <th scope="col">SQL Function</th>
                <th scope="col">Description</th>
                <th scope="col">Example Code</th>
                <th scope="col">Example Output</th>
            </tr>

            <?php
            $AdvancedFunctions = [
                ['name' => 'BIN()', 'desc' => 'Returns a binary representation of a number', 'sql' => "SELECT BIN(15);", 'file' => 'Advanced_Functions/BIN_func.php'],
                ['name' => 'BINARY', 'desc' => 'Converts a value to a binary string', 'sql' => "SELECT BINARY 'Hello';", 'file' => 'Advanced_Functions/BINARY_func.php'],
                ['name' => 'CASE', 'desc' => 'Goes through conditions and return a value when the first condition is met', 'sql' => "SELECT Order ID, Quantity, CASE WHEN Quantity > 30 THEN 'The quantity is greater than 30' WHEN Quantity = 30 THEN 'The quantity is 30' ELSE 'The quantity is under 30' END FROM OderDetails;", 'file' => 'Advanced_Functions/CASE_func.php'],
                ['name' => 'CAST()', 'desc' => 'Converts a value (of any type) into a specified datatype', 'sql' => "SELECT CAST('2017-08-29' AS DATE);", 'file' => 'Advanced_Functions/CAST_func.php'],
                ['name' => 'COALESCE()', 'desc' => 'Returns the first non-null value in a list', 'sql' => "SELECT COALESCE(NULL, NULL, NULL, 'W3Schools.com', NULL, 'Example.com');", 'file' => 'Advanced_Functions/COALESCE_func.php'],
                ['name' => 'CONNECTION_ID()', 'desc' => 'Returns the unique connection ID for the current connection', 'sql' => "SELECT CONNECTION_ID();", 'file' => 'Advanced_Functions/CONNECTION_ID_func.php'],
                ['name' => 'CONV()', 'desc' => 'Converts a number from one numeric base system to another', 'sql' => "SELECT CONV(15, 10, 2);", 'file' => 'Advanced_Functions/CONV_func.php'],
                ['name' => 'CONVERT()', 'desc' => 'Converts a value into the specified datatype or character set', 'sql' => "SELECT CONVERT('2017-08-29', DATE);", 'file' => 'Advanced_Functions/CONVERT_func.php'],
                ['name' => 'CURRENT_USER()', 'desc' => 'Returns the user name and host name for the MySQL account that the server used to authenticate the current client', 'sql' => "SELECT CURRENT_USER();", 'file' => 'Advanced_Functions/CURRENT_USER_func.php'],
                ['name' => 'DATABASE()', 'desc' => 'Returns the name of the current database', 'sql' => "SELECT DATABASE();", 'file' => 'Advanced_Functions/DATABASE_func.php'],
                ['name' => 'IF()', 'desc' => 'Returns a value if a condition is TRUE, or another value if a condition is FALSE', 'sql' => "SELECT IF(500<1000, 'YES', 'NO');", 'file' => 'Advanced_Functions/IF_func.php'],
                ['name' => 'IFNULL()', 'desc' => 'Return a specified value if the expression is NULL, otherwise return the expression', 'sql' => "SELECT IFNULL(NULL, 'W3Schools.com');", 'file' => 'Advanced_Functions/IFNULL_func.php'],
                ['name' => 'ISNULL()', 'desc' => 'Returns 1 or 0 depending on whether an expression is NULL', 'sql' => "SELECT ISNULL(NULL);", 'file' => 'Advanced_Functions/ISNULL_func.php'],
                ['name' => 'LAST_INSERT_ID()', 'desc' => 'Returns the AUTO_INCREMENT id of the last row that has been inserted or updated in a table', 'sql' => "SELECT LAST_INSERT_ID();", 'file' => 'Advanced_Functions/LAST_INSERT_ID_func.php'],
                ['name' => 'NULLIF()', 'desc' => 'Compares two expressions and returns NULL if they are equal. Otherwise, the first expression is returned', 'sql' => "SELECT NULLIF(25, 25);", 'file' => 'Advanced_Functions/NULLIF_func.php'],
                ['name' => 'SESSION_USER()', 'desc' => 'Returns the current MySQL user name and host name', 'sql' => "SELECT SESSION_USER();", 'file' => 'Advanced_Functions/SESSION_USER_func.php'],
                ['name' => 'SYSTEM_USER()', 'desc' => 'Returns the current MySQL user name and host name', 'sql' => "SELECT SYSTEM_USER();", 'file' => 'Advanced_Functions/SYSTEM_USER_func.php'],
                ['name' => 'USER()', 'desc' => 'Returns the current MySQL user name and host name', 'sql' => "SELECT USER();", 'file' => 'Advanced_Functions/USER_func.php'],
                ['name' => 'VERSION()', 'desc' => 'Returns the current version of the MySQL database', 'sql' => "SELECT VERSION();", 'file' => 'Advanced_Functions/VERSION_func.php'],
            ];
            foreach ($AdvancedFunctions as $af) {
                echo "<tr>
                        <td>{$af['name']}</td>
                        <td>{$af['desc']}</td>
                        <td><code>" . htmlspecialchars($af['sql']) . "</code></td>
                        <td><a href='{$af['file']}' class='btn btn-outline-success' style='font-size:13px;  '>View Output</a></td>
                      </tr>";
            }
            ?>
        </table>


    </div>

</body>

</html>