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
                type: prop.type
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
            console.log('El atributo es:');
            console.log(attr);

            if (type == 'attr') {
                rect.setAttribute(this.attr, attr + unit);
            } else if (type == 'css') {
                rect.style[this.attr] = attr + unit;
            }


            if (time >= duration || attr >= to) {
                clearInterval(timer)
            };
        }, 1000 / 60);
        rect.setAttribute(this.attr, from + unit);
    }

    Animation.prototype.easeInOutQuart = function(t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    }


    return Animation;
})();