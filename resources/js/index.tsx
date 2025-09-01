import React from "react";
import { createRoot } from "react-dom/client";
import "../css/app.css"; // import Tailwind
import { HeaderSection } from "./components/HeaderSection";
import { ProfileSection } from "./components/ProfileSection";
import { ScheduleSection } from "./components/ScheduleSection";

export const IlabUi = (): JSX.Element => {
    return (
        <div className="bg-[#d2f0fe] grid justify-items-center [align-items:start] w-screen">
            <div className="bg-[#d2f0fe] w-[1280px] h-[720px] relative">
                <ScheduleSection />
                <HeaderSection />
                <ProfileSection />
            </div>
        </div>
    );
};
