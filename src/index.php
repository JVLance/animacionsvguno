<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="styles.css?v=3">
    <script type = "text/javascript" src = "jquery.min.js"></script>
    <script type = "text/javascript" src = "app.js?v=1"></script>
</head>

<body>
    <div id="horizontal">
        <?php require('horizontal.php');  ?>
    </div>

    <div id="vertical">
        <?php require('vertical.php'); ?>
    </div>


    <script type="text/javascript">
        checkOrientation();

        /* MANTENCIÓN DE LA ESCALA DE LA IMAGEN Y COLOCACIÓN DE MARCOS */
        setInterval(function(){
            setMedidas('contenedor', 1358, 622);
            setMedidas('contenedor_v', 720, 1116);
        }, 10);
        
        /* ANIMACIONES EN HORIZONTAL */
        let animations_horizontal = [{
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
                //$("#" + this.element).show("slide", { direction: "left" },  this.duration * 1000);
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
                    to: 568,
                    unit: 'px',
                    type: 'css'
                }
            },
            fade: true,
            duration: 1,
            position: 5.2
        }];

        let animador_horizontal = new Animator({
            name: 'animador_horizontal',
            duration: 10,
            animations: animations_horizontal,
            width: 1358,
            height: 622,
            container: 'horizontal'
        });

        animador_horizontal.run();


        /* ANIMACIONES EN VERTICAL */
        let animations_vertical = [{
            name: 'Animacion_Fondo_vertical',
            element: 'Fondo_vertical',
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
            name: 'Titulo_vertical',
            element: 'Titulo_vertical',
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
            name: 'servicios_digitales_vertical',
            element: 'Servicios_digitales_vertical',
            fade: true,
            duration: 1,
            position: 1.5,
            custom : function () {
                //$("#" + this.element).show("slide", { direction: "left" },  this.duration * 1000);
            },
            duration: 1,
            position: 2.8
        },
        {
            name: 'Megafono_vertical',
            element: 'Megafono_vertical',
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
            name: 'Teclado_vertical',
            element: 'Teclado_vertical',
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
            name: 'Pincel_vertical',
            element: 'Pincel_vertical',
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
            name: 'Footer_vertical',
            element: 'Footer_vertical',
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

        let animador_vertical = new Animator({
            name: 'animador_vertical',
            duration: 10,
            animations: animations_vertical,
            width:  720,
            height: 1116,
            container: 'horizontal'
        });

        animador_vertical.run();
    </script>
</body>

</html>