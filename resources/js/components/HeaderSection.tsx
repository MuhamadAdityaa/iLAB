import React from "react";
import icon3 from "./icon-3.svg";
import icon from "./icon.svg";
import image1 from "./image-1.png";
import image2 from "./image-2.png";

export const HeaderSection = () => {
    return (
        <header className="w-[751px] justify-center gap-6 absolute top-8 left-[50px] flex items-center">
            <div className="flex flex-col w-[52px] h-[51px] items-center justify-center gap-2.5 relative">
                <img
                    className="relative flex-1 self-stretch w-full grow"
                    alt="Menu icon"
                    src={icon}
                />
            </div>

            <div className="flex h-[68px] items-center justify-between p-6 relative flex-1 grow bg-white rounded-2xl border-2 border-solid border-black shadow-[5px_5px_0px_#000000]">
                <div className="inline-flex items-center gap-4 relative flex-[0_0_auto] mt-[-4.50px] mb-[-0.50px]">
                    <img
                        className="relative w-[22.15px] h-6"
                        alt="Calendar icon"
                        src={icon3}
                    />

                    <div className="inline-flex items-center gap-2 relative flex-[0_0_auto]">
                        <div className="relative w-fit mt-[-1.00px] [font-family:'Be_Vietnam_Pro-Bold',Helvetica] font-bold text-black text-xl tracking-[0] leading-[normal]">
                            Rabu
                        </div>
                    </div>
                </div>

                <p className="relative w-fit mt-[-4.50px] mb-[-0.50px] [font-family:'Be_Vietnam_Pro-Bold',Helvetica] font-bold text-black text-xl tracking-[0] leading-[normal]">
                    13 - Agustus - 2025
                </p>
            </div>

            <img
                className="w-20 aspect-[1.02] relative h-[79px] mb-[-5.00px] object-cover"
                alt="Profile image"
                src={image2}
            />

            <img
                className="w-[79px] mr-[-5.00px] aspect-[1] relative h-[79px] mb-[-5.00px] object-cover"
                alt="School logo"
                src={image1}
            />
        </header>
    );
};
