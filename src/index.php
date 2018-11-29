<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="styles.css?v=1">
    <script type = "text/javascript" src = "jquery.min.js"></script>
    <script type = "text/javascript" src = "app.js?v=3"></script>
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
                top: {
                    from : 176,
                    to : 144,
                    type: 'css'
                },
                left: {
                    from : 308,
                    to : 173,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 370,
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 65,
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
            fade: false,
            duration: 1,
            position: 1.5,
            custom: maskAparition('right'),
            duration: 1,
            position: 2.8
        },
        {
            name: 'Megafono',
            element: 'Megafono',
            props: {
                top: {
                    from : 408.8,
                    to : 249,
                    type: 'css'
                },
                left: {
                    from : 801.8,
                    to : 701,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 201.625,
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
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
                top: {
                    from : 178.8,
                    to : 78,
                    type: 'css'
                },
                left: {
                    from : 943.81,
                    to : 843,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 201.625,
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
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
                top: {
                    from : 349.8,
                    to : 249,
                    type: 'css'
                },
                left: {
                    from : 1082.8,
                    to : 982,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 201.625,
                    
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    
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
                top: {
                    from : 210.7,
                    to : 164,
                    type: 'css'
                },
                left: {
                    from : 360.1445,
                    to : 130,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 460.289,
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 93.401,
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
            fade: false,
            duration: 1,
            position: 1.5,
            custom : maskAparition('right'),
            duration: 1,
            position: 2.8
        },
        {
            name: 'Megafono_vertical',
            element: 'Megafono_vertical',
            props: {
                top: {
                    from : 601.8125,
                    to : 501,
                    type: 'css'
                },
                left: {
                    from : 123.812,
                    to : 23,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 201.625,
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    
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
                top: {
                    from : 710.8125,
                    to : 610,
                    type: 'css'
                },
                left: {
                    from : 360.8125,
                    to : 260,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 201.625,
                    
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    
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
                top: {
                    from : 601.8125,
                    to : 501,
                    type: 'css'
                },
                left: {
                    from : 597.8125,
                    to : 497,
                    type: 'css'
                },
                width: {
                    from: 0,
                    to: 201.625,
                    
                    type: 'css'
                },
                height: {
                    from: 0,
                    to: 201.625,
                    
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
                    from: 1100,
                    to: 1062,
                    
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