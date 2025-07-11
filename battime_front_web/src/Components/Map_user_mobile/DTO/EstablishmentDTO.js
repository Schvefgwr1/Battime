import {EstablishmentInformationDTO} from "./EstablishmentInformationDTO";
import {EstablishmentCoordinatesDTO} from "./EstablishmentCoordinatesDTO";

export class EstablishmentDTO {
    /**@type {integer}*/
    id

    /**@type {string}*/
    name;

    /**@type {[]}*/
    likes;

    /**@type {number} */
    workloadParameter;

    /**@type {string} */
    establishmentLikes;

    /**@type {EstablishmentInformationDTO}*/
    establishmentInformation;

    /**@type {string}*/
    address;

    /**@type {EstablishmentCoordinatesDTO}*/
    establishmentCoordinates;

    /**@type {[]}*/
    filters

    constructor(data = null) {
        this.id = data?.id;
        this.name = data?.name;
        this.likes = data?.likes;
        this.workloadParameter = data?.workload_parameter;
        this.establishmentLikes = data?.establishment_likes;
        this.establishmentInformation = new EstablishmentInformationDTO(
                data?.establishment_info
        );
        this.address = data?.establishment_address
        this.establishmentCoordinates = new EstablishmentCoordinatesDTO(
            data?.coordinates
        );
        this.filters = data?.filters;
    }

    setLikes(likes) {
        this.likes = likes;
    }
}