<!DOCTYPE html>
<html>
<body>
    <?php
        trait language{
            public function type() {
                echo "PHP";
            }
        }

        class Select{
            use language;
        }

        $php = new Select();

        $php->type();
    ?>
</body>
</html>
