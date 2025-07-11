import React from "react";
import Photo from "./Photo";


export default function Photos({photos_links}) {

    const listOfPhotos = (links) => {
        if(links?.length === 0 || links == null) {
            return <div className="photos-in-line"></div>
        }
        else {
            return links.map((link) =>
                <div className="photos-in-line">
                    <Photo name={link}/>
                </div>
            )
        }
    }

    return (
        <div className="photos-line">
            {listOfPhotos(photos_links)}
        </div>
    )
}