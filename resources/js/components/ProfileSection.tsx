import React from "react";
import ICON from "./ICON.svg";
import icon2 from "./icon-2.svg";
import icon4 from "./icon-4.svg";
import image from "./image.svg";

export const ProfileSection = (): JSX.Element => {
    const profileData = [
        {
            id: 1,
            icon: icon4,
            text: "Muhamad Aditya",
            alt: "User Icon",
        },
        {
            id: 2,
            icon: image,
            text: "Matematika",
            alt: "Subject Icon",
        },
        {
            id: 3,
            icon: icon2,
            text: "Lab 1",
            alt: "Location Icon",
        },
        {
            id: 4,
            icon: ICON,
            text: "7:15-10:50",
            alt: "Time Icon",
        },
    ];

    return (
        <section className="flex flex-col w-[755px] h-[556px] items-start gap-[31px] p-[18px] absolute top-[134px] left-12 bg-white rounded-2xl border-2 border-solid border-black shadow-[5px_5px_0px_#000000]">
            <div className="flex w-[721px] h-[346px] items-start gap-[31px] relative mr-[-2.00px]">
                <div
                    className="relative w-[345px] h-[345px] rounded-3xl border-2 border-solid border-black shadow-[5px_5px_0px_#000000] aspect-[1] bg-[url(/IMAGE.png)] bg-cover bg-[50%_50%]"
                    role="img"
                    aria-label="Profile picture"
                />

                <div className="flex flex-col h-[516px] items-start gap-[18px] relative flex-1 grow mb-[-170.00px]">
                    {profileData.map((item) => (
                        <div
                            key={item.id}
                            className="flex items-center gap-4 p-6 relative self-stretch w-full flex-[0_0_auto] mt-[-2.00px] ml-[-2.00px] mr-[-2.00px] bg-[#93ddff] rounded-2xl border-2 border-solid border-black shadow-[5px_5px_0px_#000000]"
                        >
                            <img
                                className={`relative ${item.id === 1
                                        ? "w-6 h-[23.08px]"
                                        : item.id === 2
                                            ? "w-[20.31px] h-6"
                                            : item.id === 3
                                                ? "w-[23.04px] h-6"
                                                : "w-[25.85px] h-6"
                                    }`}
                                alt={item.alt}
                                src={item.icon}
                            />

                            <div
                                className={`${item.id === 1
                                        ? "inline-flex items-center gap-2 relative flex-[0_0_auto]"
                                        : ""
                                    }`}
                            >
                                <div
                                    className={`${item.id === 1
                                            ? "relative w-fit mt-[-1.00px]"
                                            : item.id === 2
                                                ? "w-fit"
                                                : "relative w-fit"
                                        } [font-family:'Be_Vietnam_Pro-SemiBold',Helvetica] font-semibold text-black text-xl tracking-[0] leading-[normal]`}
                                >
                                    {item.text}
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>

            <div className="flex h-[143px] items-center justify-around gap-4 p-6 relative self-stretch w-full ml-[-2.00px] bg-white rounded-2xl border-2 border-solid border-black shadow-[5px_5px_0px_#000000]">
                <time className="relative w-fit mt-[-35.50px] mb-[-31.50px] [font-family:'Be_Vietnam_Pro-Bold',Helvetica] font-bold text-black text-9xl tracking-[0] leading-[normal]">
                    10:33
                </time>
            </div>
        </section>
    );
};
