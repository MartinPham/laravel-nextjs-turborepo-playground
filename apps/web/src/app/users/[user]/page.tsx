import { garageCars, garageUser } from "@repo/api-client";

export default async function User({
  params,
}: {
  params: Promise<{ user: string }>;
}) {
  const { user } = await params;
  const { data } = await garageUser(user);
  return (
    <div className="font-sans grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20">
      <main className="flex flex-col gap-[32px] row-start-2 items-center sm:items-start">
        <ul className="font-mono list-inside text-sm/6 text-center sm:text-left">
          <li className="tracking-[-.01em]">User: {data.user?.name}</li>
          <li className="tracking-[-.01em]">Car: {data.car?.model}</li>
          <li className="tracking-[-.01em]">Plate: {data.plate?.number}</li>
          <li className="tracking-[-.01em]">Mechanic: {data.mechanic?.name}</li>
        </ul>
      </main>
    </div>
  );
}
