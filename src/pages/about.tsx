import client from 'graphql/client'
import { GetPageBySlugQuery } from 'graphql/generated/graphql'
import { GET_ABOUT_BY_SLUG } from 'graphql/queries'
import { GetStaticProps } from 'next'
// import { useRouter } from 'next/dist/client/router'
import AboutTemplate, { AboutTemplateProps } from 'templates/About'

export default function AboutPage({
  headingDesign,
  textDesign,
  // aboutPhoto,
  aboutDescription,
  headingEconomist,
  textEconomist,
  briefEconomist,
  aboutExpertise,
  descriptionExpertise,
  aboutSharping,
  descriptionSharping,
  getInTouch
}: AboutTemplateProps) {
  // const router = useRouter()

  // if (router.isFallback) return null

  return (
    <AboutTemplate
      headingDesign={headingDesign}
      textDesign={textDesign}
      // aboutPhoto={aboutPhoto}
      aboutDescription={aboutDescription}
      headingEconomist={headingEconomist}
      textEconomist={textEconomist}
      briefEconomist={briefEconomist}
      aboutExpertise={aboutExpertise}
      descriptionExpertise={descriptionExpertise}
      aboutSharping={aboutSharping}
      descriptionSharping={descriptionSharping}
      getInTouch={getInTouch}
    />
  )
}

// export async function getSatitcPaths() {
//   const { abouts } = await client.request<AboutPageQuery>(GET_ABOUT)

//   const path = abouts.map(({ slug }) => ({
//     params: { slug }
//   }))

//   return { path, fallback: true }
// }

export const getSatitcProps: GetStaticProps = async () => {
  const { about } = await client.request<GetPageBySlugQuery>(GET_ABOUT_BY_SLUG)

  if (!about) return { notFound: true }

  return {
    props: {
      headingDesign: about.headingDesign,
      textDesign: about.textDesign.html,
      // aboutPhoto: about.aboutPhoto,
      aboutDescription: about.aboutDescription.html,
      headingEconomist: about.headingEconomist,
      textEconomist: about.textEconomist.html,
      briefEconomist: about.briefEconomist.html,
      aboutExpertise: about.aboutExpertise,
      descriptionExpertise: about.descriptionExpertise.html,
      aboutSharping: about.aboutSharping,
      descriptionSharping: about.descriptionSharping.html,
      getInTouch: about.getInTouch
    }
  }
}
