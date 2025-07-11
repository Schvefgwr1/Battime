import React, {useEffect, useState} from "react";
import {Drawer} from "antd";
import "../../../Css/Map_user_mobile/EstablishmentOverlay.css";
import "../../../Css/Map_user_mobile/Overlays.css";
import DrawerContainer from "./DrawerContainer";

export default function EstablishmentOverlay(
    {overlay_est_state,
    setOverlayEstState,
    establishment,
    state,
    cookies}
) {

    return(
        <Drawer
            placement='bottom'
            closable={false}
            onClose={()=> setOverlayEstState(0)}
            open={overlay_est_state}
            key='bottom'
        >
            <DrawerContainer establishment={establishment}
                             state={state}
                             cookies={cookies}/>
        </Drawer>
    )
}