import { load } from '@2gis/mapgl';
import {useEffect} from "react";
import {MapWrapper} from "./MapWrapper";

import emoji_0 from "../../img/establishment_markers/emoji_0.svg"
import emoji_1 from "../../img/establishment_markers/emoji_1.svg"
import emoji_2 from "../../img/establishment_markers/emoji_2.svg"
import emoji_3 from "../../img/establishment_markers/emoji_3.svg"

const emojiImages = {
    0: emoji_0,
    1: emoji_1,
    2: emoji_2,
    3: emoji_3,
};

export const Map = (
    {points,
    setOverlayEstablishmentState,
    setPointOpenId,
    handleUseEstablishmentRequest,
    pointOpenId,
    setCenter}
) => {
    useEffect(()=>{
        let map;

        load().then((mapglAPI) => {
            map = new mapglAPI.Map('map-container', {
                center: [37.618387, 55.752378],
                styleZoom: 16,
                pitch: 40,
                key: process.env.REACT_APP_MAP_KEY,
                style: process.env.REACT_APP_MAP_STYLE,
            });
            console.log(points);

            points.forEach((point) => {
                const marker = new mapglAPI.Marker(map, {
                    coordinates: [point?.coordinates?.longitude, point?.coordinates?.latitude],
                    icon: emojiImages[point?.emoji]
                });
                marker.on('click', (e) => {
                    console.log("In click");
                    setPointOpenId(point?.id);
                    console.log(pointOpenId, point?.id);
                    handleUseEstablishmentRequest(point?.id);
                    setOverlayEstablishmentState(1);
                });
            });
            setCenter(map.getCenter());
            console.log(map.getCenter());
        });
        return () => map && map.destroy();
    },[])

    return (
        <div style={{ width: '100%', height: '100%' }}>
            <MapWrapper />
        </div>
    );
};