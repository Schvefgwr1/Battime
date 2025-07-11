import {EstablishmentContactsDTO} from "./EstablishmentContactsDTO";

export class EstablishmentInformationDTO {

    /**@type {string}*/
    description;

    /**@type {[]}*/
    menu;

    /**@type {EstablishmentContactsDTO}*/
    establishmentContacts;

    constructor(data = null) {
        this.description = data?.description;
        this.menu = data?.establishment_menu;
        this.establishmentContacts = new EstablishmentContactsDTO(
                data?.establishment_contacts
        );
    }
}