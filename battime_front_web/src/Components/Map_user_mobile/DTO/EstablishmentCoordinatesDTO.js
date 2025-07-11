export class EstablishmentCoordinatesDTO {

    /**@type {number}*/
    latitude;

    /**@type {number}*/
    longitude;

    constructor(data = null) {
        this.latitude = data?.latitude
        this.longitude = data?.longitude
    }
}