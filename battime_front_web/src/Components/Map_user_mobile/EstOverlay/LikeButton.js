import React from "react";
import {SetLikeRequest} from "../../../WebRequests/ClickLikeRequest";
export default function LikeButton({cookies, establishment, liked, setLiked}) {
    let flag = false;
    if(liked) {
        for(let i = 0; i < liked.length; i++) {
            if(liked[i]?.id === establishment.id) {
                flag = true;
            }
        }
    }

    const like = () => {
        console.log(establishment)
        SetLikeRequest(cookies, setLiked, establishment);
    }

    if(flag) {
        return (
            <div className="contener-likes">
                <div className="likes-button" id="click-button" onClick={like}>
                    &#10084; {establishment?.likes.length}
                </div>
            </div>
        )
    }
    else {
        return (
            <div className="contener-likes">
                <div className="likes-button" id="not-click-button" onClick={like}>
                    &#10084; {establishment?.likes.length}
                </div>
            </div>
        )
    }
}