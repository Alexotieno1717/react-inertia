import { PageWrapper } from "@/components/PageWrapper";
import { Container } from "@/components/Container";
import { Header } from "@/components/Header";
import { Search } from "@/components/Search";
import { Shortlist } from "@/components/Shortlist";
import { PuppiesList } from "@/components/PuppiesList";
import { NewPuppyForm } from "@/components/NewPuppyForm";

import { useState } from "react";
import { Puppy } from "@/types";

export default function App({ puppies }: { puppies: Puppy[] }) {
    return (
        <PageWrapper>
            <Container>
                <Header />
                <Main pups={puppies} />
            </Container>
        </PageWrapper>
    );
}

// const puppyPromise = getPuppies();

function Main({pups}: {pups:Puppy[]}) {
    // const apiPuppies = use(puppyPromise);
    const [searchQuery, setSearchQuery] = useState("");
    const [puppies, setPuppies] = useState<Puppy[]>(pups);

    return (
        <main>
            <div className="mt-24 grid gap-8 sm:grid-cols90-2">
                <Search searchQuery={searchQuery} setSearchQuery={setSearchQuery} />
                <Shortlist puppies={puppies} setPuppies={setPuppies} />
            </div>
            <PuppiesList
                puppies={puppies}
                setPuppies={setPuppies}
                searchQuery={searchQuery}
            />
            <NewPuppyForm puppies={puppies} setPuppies={setPuppies} />
        </main>
    );
}
