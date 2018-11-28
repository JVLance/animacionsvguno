/* VERIFICADOR DE TIPO DE ANIMACION */

function checkOrientation(notInterval) {
    let verificador = $(window).width() / $(window).height();

    if (verificador <= 1) {
        document.getElementById('horizontal').style.display = 'none';
        document.getElementById('vertical').style.display = 'block';
    } else {
        document.getElementById('vertical').style.display = 'none';
        document.getElementById('horizontal').style.display = 'block';
    }

    if (typeof(notInterval) == "undefined") {
        setInterval('checkOrientation(true)', 10);
    }
}


/* OBJETO ANIMADOR */
function Animator(params) {
    this.run = run;
    this.execute = execute;
    this.setAnimationCallback = setAnimationCallback;
    this.initialize = initialize;

    try {
        this.name = params.name;
    } catch (e) {
        throw 'Error: Se debe especificar el atributo name.';
    }

    this.animations = (typeof params.animations != 'undefined') ? params.animations : new Array();
    this.duration = (typeof params.duration != 'undefined') ? params.duration : 0;

    let aspecto = calculateAspectRatioFit($(window).width(), $(window).height(), params.width, params.height);

    this.width = aspecto.width;
    this.height = aspecto.height;
    this.container = params.container;

    this.callback_animations = {};
}

function run() {
    this.initialize();
    let limit = this.animations.length;
    for (let i = 0; i < limit; i++) {
        this.execute(this.animations[i]);
    }
}

function execute(animation) {
    let miliseconds = animation.position * 1000;
    this.setAnimationCallback(animation);
    setTimeout(this.name + '.callback_animations.' + animation.name + '()', miliseconds);
}

function setAnimationCallback(animation) {
    let parent = this;
    this.callback_animations[animation.name] = function() {
        let props = animation.props;
        let duration = animation.duration * 1000;

        if (animation.fade) {
            document.getElementById(animation.element).style.display = 'block';
        }

        if (typeof(animation.custom) != 'undefined') {
            return animation.custom();
        }

        for (let key in props) {
            let tinyprop = {};
            let prop = props[key];


            let animating = new Animation({
                element: animation.element,
                from: prop.from,
                to: prop.to,
                duration: duration,
                attr: key,
                unit: (typeof prop.unit != 'undefined' ? prop.unit : ''),
                type: prop.type,
                width: parent.width,
                height: parent.height,
                container: parent.container
            });

            animating.run();
        }

    }
}

function initialize() {}


let Animation = (function() {



    function Animation(obj) {
        this.set(obj);
    }

    Animation.prototype.set = function(obj) {
        for (let key in obj) {
            this[key] = obj[key];
        }
    }

    Animation.prototype.run = function() {

        let rect = document.getElementById(this.element);
        let from = this.from;
        let to = this.to; //
        let duration = this.duration;

        let start = new Date().getTime();

        let unit = typeof this.unit != 'undefined' ? this.unit : '';

        let type = this.type;

        let timer = setInterval(() => {

            let time = new Date().getTime() - start;
            let attr = this.easeInOutQuart(time, from, to - from, duration);

            if (type == 'attr') {
                rect.setAttribute(this.attr, this.getProportionalValue(attr, this.attr, unit));
            } else if (type == 'css') {
                rect.style[this.attr] = this.getProportionalValue(attr, this.attr, unit);
            }

            let attrfinal = (to > from) ? (attr >= to) : (attr <= to);

            if (time >= duration || attrfinal) {
                console.log('atributo: ' + this.attr);
                console.log('porcentaje: ' + this.getProportionalValue(attr, this.attr, unit));

                clearInterval(timer)
            };
        }, 1000 / 60);
        rect.setAttribute(this.attr, from + unit);
    }

    Animation.prototype.easeInOutQuart = function(t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    }

    Animation.prototype.getProportionalValue = function(value, name, unit) {
        let orientation = null;
        if (name == 'width' || name == 'left' || name == 'right') {
            orientation = 'horizontal';
        } else if (name == 'height' || name == 'top' || name == 'bottom') {
            orientation = 'vertical';
        } else {
            return value + unit;
        }

        //let maxSizes = calculateAspectRatioFit($(window).width(), $(window).height(), this.width, this.height);
        /*
        console.log("El maxSizes es ");
        console.log

        let cont_w = parseFloat(document.getElementById(this.container).clientWidth);
        let cont_h = parseFloat(document.getElementById(this.container).clientHeight);
        */

        //let container = calculateAspectRatioFit(maxSizes.width, maxSizes.height, value, value);

        let comparer = (orientation == 'horizontal') ? this.width : this.height;


        let percentage = (value / comparer) * 100;

        return percentage + '%';


    }


    return Animation;
})();


function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {

    let height = (srcHeight > maxHeight) ? maxHeight : srcHeight;
    let width = (srcWidth > maxWidth) ? maxWidth : srcWidth;


    if (maxWidth > maxHeight) {
        let ratio = maxWidth / maxHeight;
        height = width / ratio;
    } else {
        let ratio = maxHeight / maxWidth;
        width = height / ratio;
    }

    return {
        width: width,
        height: height
    }
}
/* MANTENCIÓN DE LA ESCALA DE LA IMAGEN Y COLOCACIÓN DE MARCOS */


function setMedidas(clase, width, height) {

    /* HORIZONTAL */
    let aspecto = calculateAspectRatioFit($(window).width(), $(window).height(), width, height);

    let w = (aspecto.width / $(window).width()) * 100;
    let h = (aspecto.height / $(window).height()) * 100;

    let margin_w = ($(window).width() - aspecto.width);
    let margin_h = ($(window).height() - aspecto.height);

    margin_w = (margin_w / $(window).width()) / 100;
    margin_h = (margin_h / $(window).height()) / 100;



    $('.' + clase).css('width', w + '%');
    $('.' + clase).css('height', h + '%');
    $('.' + clase).css('margin-left', margin_w + '%');
    $('.' + clase).css('margin-top', margin_h + '%');
}