import React from "react";
import Photos from "./MenuPhotos/Photos";


export default function MenuPhotos(
    {menu_links}
) {

    //let ph_links = ["TestMenuEst1", "TestMenuEst2", "TestMenuEst1", "TestMenuEst2", "TestMenuEst1"];

    console.log(menu_links);

    return (
        <div className="main-photos-contener">
            <Photos photos_links={menu_links}/>
        </div>
    )
}