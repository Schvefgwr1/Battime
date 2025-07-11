import React, {useState} from "react";
import '../../../Css/main.css';
import SearchIcon1 from "../../img/SearchIcon1.png";

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

export default function SuggestionElement({suggestion}){
    return(
        <div className="suggestion-search-element">
            <div className="suggestion-search-element-line-1">
                <div className="suggestion-search-element-line-1-icon">
                    <img src={emojiImages[suggestion?.link_to_emoji]}
                         className="suggestion-search-element-line-1-icon-img"/>
                </div>
                <div className="suggestion-search-element-line-1-icon-middle">
                    <div className="suggestion-search-element-line-1-middle-title">
                        {suggestion.name}
                    </div>
                    <div className="suggestion-search-element-line-1-middle-address">
                        {suggestion.address}
                    </div>
                </div>
                <div className="suggestion-search-element-line-1-distance">
                    {suggestion.distance}
                </div>
            </div>
            <div className="suggestion-search-element-line-2">
                <div className='suggestion-search-element-line-2-underline'/>
            </div>
        </div>
    )
}
