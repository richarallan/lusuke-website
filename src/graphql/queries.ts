import { gql } from 'graphql-request'

export const GET_ABOUT = gql`
  query aboutPage {
    abouts {
      id
      slug
      headingDesign
      textDesign {
        html
      }
      aboutPhoto {
        url
      }
      aboutDescription {
        html
      }
      headingEconomist
      textEconomist {
        html
      }
      briefEconomist {
        html
      }
      aboutExpertise
      descriptionExpertise {
        html
      }
      aboutSharping
      descriptionSharping {
        html
      }
    }
  }
`

export const GET_ABOUT_BY_SLUG = gql`
  query getPageBySlug($slug: String!) {
    about(where: { slug: $slug }) {
      id
      slug
      headingDesign
      textDesign {
        html
      }
      aboutPhoto {
        url
      }
      aboutDescription {
        html
      }
      headingEconomist
      textEconomist {
        html
      }
      briefEconomist {
        html
      }
      aboutExpertise
      descriptionExpertise {
        html
      }
      aboutSharping
      descriptionSharping {
        html
      }
    }
  }
`
