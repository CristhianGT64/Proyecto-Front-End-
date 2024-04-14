//Objeto de posiciones de un motorista
 export class ubicacionRepartidor {
    _idRepartidor = 0;
    _rumbo = 0;
    _distanciaActualDelCentro = 0;
    _latCentro = 14.0857108;
    _lngCentro = -87.1994419;
    _latRepartidor = 0;
    _lngRepartidor = 0;

    // Constructo Vacio
    // constructor() {
    // }

    //Constructor con valores
    constructor(idRepartidor, rumbo, distanciaActualDelCentro,latRepartidor, lngRepartidor) {    
        this.idRepartidor = idRepartidor;
        this.rumbo = rumbo;
        this.distanciaActualDelCentro = distanciaActualDelCentro;
        this.latRepartidor = latRepartidor;
        this.lngRepartidor = lngRepartidor
    }

    ModificarDireccion(){
        // console.log(Math.floor(Math.random() * (max - min)) + min);
        if(this._distanciaActualDelCentro >= 5){
            return this._distanciaActualDelCentro -= .8;
        }
        return this._distanciaActualDelCentro += (Math.random() * 2 - 1); //Hace una distancia aleatoria que sumara o restara
    }

    ModificarAngulo(){
        if(this._rumbo >= 380){
           return this.rumbo -= 2;
       }
       return this._rumbo +=  (Math.random() * 5 - 5);

        // return this._rumbo;
    }

    get idRepartidor() {
        return this._idRepartidor;
    }
    set idRepartidor(value) {
        this._idRepartidor = value;
    }

    get rumbo() {
        return this._rumbo;
    }
    set rumbo(value) {
        this._rumbo = value;
    }
    get distanciaActualDelCentro() {
        return this._distanciaActualDelCentro;
    }
    set distanciaActualDelCentro(value) {
        this._distanciaActualDelCentro = value;
    }

    get latCentro() {
        return this._latCentro;
    }
    set latCentro(value) {
        this._latCentro = value;
    }

    get lngCentro() {
        return this._lngCentro;
    }
    set lngCentro(value) {
        this._lngCentro = value;
    }
    get latRepartidor() {
        return this._latRepartidor;
    }
    set latRepartidor(value) {
        this._latRepartidor = value;
    }
    get lngRepartidor() {
        return this._lngRepartidor;
    }
    set lngRepartidor(value) {
        this._lngRepartidor = value;
    }
}
