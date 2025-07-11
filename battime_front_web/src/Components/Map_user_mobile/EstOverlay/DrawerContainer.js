import React, {useState} from "react";
import {Progress} from "antd";
import EstablishmentOverlayMenu from "./EstablishmentOverlayMenu";
import MenuContener from "./MenuContent/MenuContener";
import "../../../Css/Map_user_mobile/EstablishmentOverlay.css";
import "../../../Css/Map_user_mobile/LoadingAndErrorContainers.css";
import {SetLikeRequest} from "../../../WebRequests/ClickLikeRequest";
import LikeButton from "./LikeButton";


export default function DrawerContainer(
    {establishment,
    state,
    cookies}
) {

    const [page, setPage] = useState(0);

    const [liked, setLiked] = useState([]);

    const twoColors = {
        '0%': '#42FF00',
        '100%': '#ff0000',
    };

    function getFontSize(length) {
        return 5;
    }

    switch (state) {
        case "main":
            return (
                <div className="main-contener-est-drawer">
                    <div className="contener-swipe-line">
                        <div className="swipe-line"></div>
                    </div>
                    <div className="contener-cover-part">
                        <div className="contener-cover-first-part">
                            <div className="contener-avatar">
                                <div className="avatar-est"></div>
                                <div className="cont-img">
                                    <img src={establishment?.establishmentLikes} className="img-avatar"/>
                                </div>
                            </div>
                            <div className="contener-right">
                                <div
                                    className="contener-name"
                                    style={{fontSize: `${getFontSize(establishment?.name.length)}vw`}}
                                >
                                    &laquo;{establishment?.name}&raquo;
                                </div>
                                <LikeButton establishment={establishment}
                                            liked={liked}
                                            setLiked={setLiked}
                                            cookies={cookies}/>
                            </div>
                        </div>
                        <img src={require("../../img/BlueRectangleEstDrawer.png")} className="img-blue-rec"/>
                        <div className="contener-progress-bar">
                            <Progress percent={establishment?.workloadParameter} strokeColor={twoColors}/>
                        </div>
                        <div className="contener-image-people">
                            <img src={require("../../img/vector-people.png")} className="img-people"/>
                        </div>
                    </div>
                    <div className="menu__container">
                        <EstablishmentOverlayMenu page={page} setPage={setPage}/>
                    </div>
                    <MenuContener page={page}
                                  description={establishment?.establishmentInformation?.description}
                                  menu_links={establishment?.establishmentInformation?.menu}
                                  contacts={establishment?.establishmentInformation?.establishmentContacts}
                                  filters={establishment?.filters}/>
                </div>
            );
        case "loading":
            return (
                <div className="main-contener-est-drawer">
                    <div className="text-er_lo-cont">
                        <div className='h1 white'>
                            Loading...
                        </div>
                    </div>
                </div>
            );
        case "error":
            return (
                <div className="main-contener-est-drawer">
                    <div className="text-er_lo-cont">
                        <div className="error_message-style">
                            ERROR
                        </div>
                    </div>
                </div>
            );
        default:
            return (
                <div className="main-contener-est-drawer">
                    <div className="text-er_lo-cont">
                        <div className="error_message-style">
                            ERROR
                        </div>
                    </div>
                </div>
            );
    }
}