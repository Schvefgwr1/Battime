import React from "react";
import LoginAllMobile from "./Components/Login_all_mobile/LoginAllMobile";
import Page404 from "./Components/Page404/Page404";
import {BrowserRouter, Routes, Route} from "react-router-dom";
import { BrowserView, MobileView, isBrowser, isMobile } from 'react-device-detect';
import CodeUserMobile from "./Components/Code_user_mobile/CodeUserMobile";
import MapUserMobile from "./Components/Map_user_mobile/MapUserMobile";
import ProfileUserMobile from "./Components/Profile_user_mobile/ProfileUserMobile";

export default function Routing() {
    if (isBrowser){
        return(
            //add anew path by using <Route/> element
            <BrowserRouter>
                <Routes>
                    //Routes for login:start
                    <Route path="/login" element={<LoginAllMobile/>} />
                    <Route path="/code" element={<CodeUserMobile/>}/>
                    //Routes for login:end
                    //Service routes:start
                    <Route path="/" element={<LoginAllMobile/>}/>
                    <Route path="*" element={<Page404/>}/>
                    <Route path="/map" element={<MapUserMobile/>}/>
                    //Service routes:end
                </Routes>
            </BrowserRouter>
        )
    } else if(isMobile){
        return(
            //add anew path by using <Route/> element
            <BrowserRouter>
                <Routes>
                    //Routes for login:start
                    <Route path="/login" element={<LoginAllMobile/>} />
                    <Route path="/code" element={<CodeUserMobile/>}/>
                    //Routes for login:end
                    //Service routes:start
                    <Route path="/" element={<LoginAllMobile/>}/>
                    <Route path="*" element={<Page404/>}/>
                    //Service routes:end
                    //App Pages:start
                    <Route path="/map" element={<MapUserMobile/>}/>
                    <Route path="/profile" element={<ProfileUserMobile/>}/>
                    //App Pages:end
                </Routes>
            </BrowserRouter>
        )
    }



}
