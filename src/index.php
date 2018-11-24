<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="styles.css?v=1">
    <script type = "text/javascript" src = "jquery.min.js"></script>
    <script type = "text/javascript" src = "app.js"></script>
</head>

<body>
    <div id="horizontal" style = "height:100%; width:100%; overflow:hidden; position:absolute;">
        <?php require('horizontal.php'); ?>
    </div>
    </div>

    <div id="vertical">

    </div>

    <script type="text/javascript">

        let animations = [{
            name: 'Animacion_Fondo',
            element: 'Fondo',
            props: {
                opacity: {
                    from: 0,
                    to: 1,
                    type: 'attr'
                }
            },
            fade: true,
            duration: 1.5,
            position: 0
        }, 
        {
            name: 'Titulo',
            element: 'Titulo',
            props: {

                width: {
                    from: 0,
                    to: 370,
                    unit: 'px',
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 65,
                    unit: 'px',
                    type: 'css'
                }
            },
            fade: true,
            duration: 1,
            position: 1.5
        },
        {
            name: 'servicios_digitales',
            element: 'Servicios_digitales',
            fade: true,
            duration: 1,
            position: 1.5,
            custom : function () {
                $("#" + this.element).show("slide", { direction: "left" },  this.duration * 1000);
            },
            duration: 1,
            position: 2.8
        },
        {
            name: 'Megafono',
            element: 'Megafono',
            props: {

                width: {
                    from: 0,
                    to: 201.625,
                    unit: 'px',
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    unit: 'px',
                    type: 'css'
                }
            },
            fade: true,
            duration: 0.6,
            position: 3.2
        },
        {
            name: 'Teclado',
            element: 'Teclado',
            props: {

                width: {
                    from: 0,
                    to: 201.625,
                    unit: 'px',
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    unit: 'px',
                    type: 'css'
                }
            },
            fade: true,
            duration: 0.6,
            position: 4
        },
        {
            name: 'Pincel',
            element: 'Pincel',
            props: {

                width: {
                    from: 0,
                    to: 201.625,
                    unit: 'px',
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    unit: 'px',
                    type: 'css'
                }
            },
            fade: true,
            duration: 0.6,
            position: 4.8
        },
        {
            name: 'Footer',
            element: 'Footer',
            props: {
                top: {
                    from: 622,
                    to: 561,
                    unit: 'px',
                    type: 'css'
                }
            },
            fade: true,
            duration: 1,
            position: 5.2
        }];

        let animador = new Animator({
            name: 'animador',
            duration: 10,
            animations: animations
        });

        animador.run();
    </script>
</body>

</html>