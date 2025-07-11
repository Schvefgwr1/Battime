import React from "react";
import "../../../../Css/Map_user_mobile/MenuContent.css";

import MenuDescription from "./MenuDescription";
import MenuPhotos from "./MenuPhotos";
import MenuContacts from "./MenuContacts";


export default function MenuContener(
    {page,
    description,
    menu_links,
    contacts,
    filters}
) {

    console.log(menu_links + "we are in contener");

    switch(page) {
        case 0:
            return (
                <div className="main-contener-menu-content">
                    <MenuDescription description={description}
                                     filters={filters}/>
                </div>
            )
        case 1:
            return (
                <div className="main-contener-menu-content">
                    <MenuPhotos menu_links={menu_links}/>
                </div>
            )
        case 2:
            return (
                <div className="main-contener-menu-content">
                    <MenuContacts contacts={contacts}/>
                </div>
            )
    }
}