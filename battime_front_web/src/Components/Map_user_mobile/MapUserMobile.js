import React, {useEffect, useState} from "react";
import './../../Css/main.css';
import "../../Css/Map_user_mobile/MapUserMobile.css";
import cocoCocktail from "../img/establishment_markers/emoji_0.svg";
import MenuButtons from "./MenuButtons";
import FindOverlay from "./FindOverlay/FindOverlay.js";
import EstablishmentOverlay from "./EstOverlay/EstablishmentOverlay.js";
import {GetEmojiPoints} from "../../WebRequests/GetEmojiPoints";
import {useCookies} from "react-cookie";
import {Map} from "./MapContainers/Map";
import LoadingPage from "../Profile_user_mobile/LoadingPage";
import ErrorPage from "../Profile_user_mobile/ErrorPage";
import {GetEstablishment} from "../../WebRequests/GetEstablishment";
import {EstablishmentDTO} from "./DTO/EstablishmentDTO";


export default function MapUserMobile(){
    const [state, setState] = useState("main");

    const [center, setCenter] = useState([0, 0]);

    const [mapRenderingState, setMapRenderingState] = useState(false);

    const [overlayFindState, setOverlayFindState] = useState(0);
    const [needToLoad, setNeedToLoad]=useState(true)
    const handleChangeOverlayFindState = (num) => {
        setOverlayFindState(num);
    }
    const [overlay_establishment_state, setOverlayEstablishmentState] = useState(0);
    const handleChangeOverlayEstablishmentState = (num) => {
        setOverlayEstablishmentState(num);
    }
    const [navigateState, setNavigateState] = useState(false);
    const handleChangeNavigateState = () => {
        setNavigateState(true);
    }

    const [cookies, setCookie] = useCookies(["pass"]);

    const [points, setPoints] = useState([]);

    const [pointOpenId, setPointOpenId] = useState(0);

    const [establishment, setEstablishment] = useState(new EstablishmentDTO());

    const [stateDrawer, setStateDrawer] = useState("main");

    const handleGetPoints = () => {
        const request =
            GetEmojiPoints(
                cookies,
                setPoints,
                setStateDrawer,
                setMapRenderingState
            );
        console.log(points);
    }

    useEffect(() => {
        handleGetPoints();
    }, [needToLoad])

    const handleUseEstablishmentRequest = (id) => {
        const request = GetEstablishment(
            cookies,
            setStateDrawer,
            setEstablishment,
            id
        );
    }

    switch (state) {
        case "main":
            return (
                <div className="main_map_block">
                    {mapRenderingState && <Map points={points}
                                               setOverlayEstablishmentState={setOverlayEstablishmentState}
                                               setPointOpenId={setPointOpenId}
                                               handleUseEstablishmentRequest={handleUseEstablishmentRequest}
                                               pointOpenId={pointOpenId}
                                               setCenter={setCenter}/>
                    }
                    <div className="buttons_label">
                        {!overlayFindState && !overlay_establishment_state && MenuButtons(
                            handleChangeOverlayFindState,
                            navigateState,
                            handleChangeNavigateState
                        )}
                        <EstablishmentOverlay overlay_est_state={overlay_establishment_state}
                                              setOverlayEstState={setOverlayEstablishmentState}
                                              establishment={establishment}
                                              state={stateDrawer}
                                              cookies={cookies}/>
                        <FindOverlay overlay_find_state={overlayFindState}
                                     setOverlayFindState={setOverlayFindState}
                                     center={center}/>
                    </div>
                </div>
            )
        case "loading":
            return (
                <LoadingPage/>
            )
        case "error":
            return (
                <ErrorPage setState = {setState}/>
            )
    }
}

