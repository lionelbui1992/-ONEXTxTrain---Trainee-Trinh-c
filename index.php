<!DOCTYPE html>
<html>
<body>
    <?php
        function sayHello($callback) {
            $callback();
        }

        function sayGoodBye() {
            echo "Bye";
        }

        sayHello("sayGoodBye");


        function getName($fname, $lname, $callback) {
            $name = "$fname $lname";
            $callback($name);
        }

        function fullName($name) {
            echo $name;
        }

        getName("trinh", "duoc", "fullname")
    ?>
</body>
</html>
