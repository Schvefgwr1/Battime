import React from "react";
import "../../../Css/Map_user_mobile/MapUserMobile.css";

export const MapWrapper = React.memo(
    () => {
        return <div id="map-container"></div>;
    },
    () => true
);