export class EstablishmentContactsDTO {
    /**@type {string}*/
    email;

    /**@type {string}*/
    vk;

    /**@type {string}*/
    inst;

    /**@type {string}*/
    telegram;

    constructor(data = null) {
        this.email = data?.establishment_email;
        this.vk = data?.establishment_vk;
        this.inst = data?.establishment_inst;
        this.telegram = data?.establishment_telegram;
    }
}