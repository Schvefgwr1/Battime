import React from "react";


export default function MenuContacts(
    {contacts}
) {

    return (
        <div className="main-contacts-contener">
            <div className="title-contacts">
                CONTACTS
            </div>
            <div className="contacts-contener">
                <div className="contener-contact-flex">
                    <div className="name-contact">
                        EMAIL:
                    </div>
                    <div className="this-contact">
                        {contacts?.email}
                    </div>
                </div>
                <div className="contener-contact-flex">
                    <div className="name-contact">
                        INST:
                    </div>
                    <div className="this-contact">
                        {contacts?.inst}
                    </div>
                </div>
                <div className="contener-contact-flex">
                    <div className="name-contact">
                        VK:
                    </div>
                    <div className="this-contact">
                        {contacts?.vk}
                    </div>
                </div>
                <div className="contener-contact-flex">
                    <div className="name-contact">
                        TELEGRAM:
                    </div>
                    <div className="this-contact">
                        {contacts?.telegram}
                    </div>
                </div>
            </div>
        </div>
    )
}