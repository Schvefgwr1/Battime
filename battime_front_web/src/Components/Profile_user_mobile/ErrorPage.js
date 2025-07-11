import React from "react";
import "../../Css/Profile_user_mobile/ErrorPage.css";


export default function ErrorPage(setState) {
    const handleChangeState = () => {
        setState("main");
    }

    return(
      <div className="error_main">
          <div className="error_text_cont">
              ERROR
          </div>
          <div className="error_button_cont">
              <div className="error_button" onClick={handleChangeState}>
                Go back
              </div>
          </div>
      </div>
    );
}