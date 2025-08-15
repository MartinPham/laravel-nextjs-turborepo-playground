import { GarageUserProps } from '@/lib/inertia';

export default function Page({ user, car, plate, mechanic }: GarageUserProps) {
    return (
        <div className="grid min-h-screen grid-rows-[20px_1fr_20px] items-center justify-items-center gap-16 p-8 pb-20 font-sans sm:p-20">
            <main className="row-start-2 flex flex-col items-center gap-[32px] sm:items-start">
                <ol className="list-inside text-center font-mono text-sm/6 sm:text-left">
                    <li className="tracking-[-.01em]">User: {user?.name}</li>
                    <li className="tracking-[-.01em]">Car: {car?.model}</li>
                    <li className="tracking-[-.01em]">Plate: {plate?.number}</li>
                    <li className="tracking-[-.01em]">Mechanic: {mechanic?.name}</li>
                </ol>
            </main>
        </div>
    );
}
