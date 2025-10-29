import { PageWrapper } from "@/components/PageWrapper";
import { Container } from "@/components/Container";
import { Header } from "@/components/Header";
import { Search } from "@/components/Search";
import { Shortlist } from "@/components/Shortlist";
import { PuppiesList } from "@/components/PuppiesList";
import { NewPuppyForm } from "@/components/NewPuppyForm";

import { useState } from "react";
import { Puppy, SharedData } from '@/types';
import { usePage } from '@inertiajs/react';

export default function App({ puppies }: { puppies: Puppy[] }) {
    return (
        <PageWrapper>
            <Container>
                <Header />
                <Main inertiaPuppies={puppies} />
            </Container>
        </PageWrapper>
    );
}

// const puppyPromise = getPuppies();

function Main({inertiaPuppies}: {inertiaPuppies:Puppy[]}) {
    // const apiPuppies = use(puppyPromise);
    const [searchQuery, setSearchQuery] = useState("");
    const [puppies, setPuppies] = useState<Puppy[]>(inertiaPuppies);
    const { auth } = usePage<SharedData>( ).props;

    return (
        <main>
            <div className="mt-24 grid gap-8 sm:grid-cols90-2">
                <Search searchQuery={searchQuery} setSearchQuery={setSearchQuery} />
                {auth.user  && <Shortlist puppies={inertiaPuppies} />}
            </div>
            <PuppiesList puppies={inertiaPuppies} searchQuery={searchQuery} />
            <NewPuppyForm puppies={inertiaPuppies} setPuppies={setPuppies} />
        </main>
    );
}
